<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $contents = Content::with(['category', 'user'])
            ->latest()
            ->paginate(10); */
            $query = Content::query();

        if(request('type') && request('type') !== 'all'){
            $query->where('type', request('type'));
        }

        $contents = $query->latest()->paginate(12);

        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.contents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'type' => 'required|in:pdf,guide',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id'
        ];

        if ($request->type === 'pdf') {
            $rules['file'] = 'required|file|mimes:pdf|max:10240';
        }

        if ($request->type === 'guide') {
            $rules['content'] = 'required|string';
        }

        $validated = $request->validate($rules);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . time()),
            'description' => $request->description,
            'type' => $request->type,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'status' => true,
        ];

        // 📄 PDF
        if ($request->type === 'pdf' && $request->hasFile('file')) {
            $file = $request->file('file');

            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('contents/pdfs', $filename, 'public');

            $data['file_path'] = $path;
            $data['original_filename'] = $file->getClientOriginalName();
            $data['file_type'] = $file->getClientMimeType();
            $data['file_size'] = $file->getSize();
        }

        // 📝 Guía
        if ($request->type === 'guide') {
            //usando purifier para sanitizar el html
            //$data['content'] = Purifier::clean($request->content);

            //ahora se usa markdown
            $data['content'] = $request->content; // markdown puro
        }

        // 🖼️ Thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $thumbName = time() . '_thumb.' . $thumb->extension();

            $data['thumbnail'] = $thumb->storeAs('contents/thumbnails', $thumbName, 'public');
        }

        Content::create($data);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Contenido creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('admin.contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.contents.edit', compact('content', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'type' => 'required|in:pdf,guide',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id'
        ];

        if ($request->type === 'pdf') {
            $rules['file'] = 'nullable|file|mimes:pdf|max:10240';
        }

        if ($request->type === 'guide') {
            $rules['content'] = 'required|string';
        }

        $validated = $request->validate($rules);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . time()),
            'description' => $request->description,
            'type' => $request->type,
            'category_id' => $request->category_id,
        ];

        // 📄 PDF
        if ($request->type === 'pdf') {

            // Si sube nuevo archivo
            if ($request->hasFile('file')) {

                // eliminar anterior
                if ($content->file_path) {
                    Storage::disk('public')->delete($content->file_path);
                }

                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('contents/pdfs', $filename, 'public');

                $data['file_path'] = $path;
                $data['original_filename'] = $file->getClientOriginalName();
                $data['file_type'] = $file->getClientMimeType();
                $data['file_size'] = $file->getSize();
            }

            // limpiar contenido si cambia de guide a pdf
            $data['content'] = null;
        }

        // 📝 Guía
        if ($request->type === 'guide') {

            $rules['content'] = 'required|string|max:50000';

            $data['content'] = $request->content;

            // limpiar archivo si cambia de pdf a guide
            if ($content->file_path) {
                Storage::disk('public')->delete($content->file_path);
            }

            $data['file_path'] = null;
            $data['original_filename'] = null;
            $data['file_type'] = null;
            $data['file_size'] = null;
        }

        // 🖼️ Thumbnail
        if ($request->hasFile('thumbnail')) {

            if ($content->thumbnail) {
                Storage::disk('public')->delete($content->thumbnail);
            }

            $thumb = $request->file('thumbnail');
            $thumbName = time() . '_thumb.' . $thumb->extension();

            $data['thumbnail'] = $thumb->storeAs('contents/thumbnails', $thumbName, 'public');
        }

        $content->update($data);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Contenido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        // eliminar archivo PDF
        if ($content->file_path) {
            Storage::disk('public')->delete($content->file_path);
        }

        // eliminar thumbnail
        if ($content->thumbnail) {
            Storage::disk('public')->delete($content->thumbnail);
        }

        $content->delete();

        return redirect()->route('admin.contents.index')
            ->with('success', 'Contenido eliminado correctamente');
    }

    public function toggle(Content $content)
    {
        $content->update([
            'status' => !$content->status
        ]);

        return back()->with('success', 'Estado actualizado');
    }
}