<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Video;
use App\Models\Content;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * ➕ Crear lección
     */
    public function create(Request $request)
    {
        $module = Module::with('course')->findOrFail($request->module_id);

        $videos = Video::pluck('title', 'id');
        $pdfs = Content::where('type', 'pdf')->pluck('title', 'id');
        $guides = Content::where('type', 'guide')->pluck('title', 'id');

        return view('admin.lessons.create', compact(
            'module',
            'videos',
            'pdfs',
            'guides'
        ));
    }

    /**
     * 💾 Guardar lección
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:video,pdf,guide',
            'content_id' => 'required|integer',
            'duration' => 'nullable|integer',
        ]);

        $data['order'] = Lesson::where('module_id', $data['module_id'])->max('order') + 1;

        Lesson::create($data);

        return back()->with('success', 'Lección creada');
    }

    /**
     * ✏️ Editar lección
     */
    public function edit(Lesson $lesson)
    {
        $module = $lesson->module;

        $videos = Video::pluck('title', 'id');
        $pdfs = Content::where('type', 'pdf')->pluck('title', 'id');
        $guides = Content::where('type', 'guide')->pluck('title', 'id');

        return view('admin.lessons.edit', compact(
            'lesson',
            'module',
            'videos',
            'pdfs',
            'guides'
        ));
    }

    /**
     * 🔄 Actualizar lección
     */
    public function update(Request $request, Lesson $lesson)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:video,pdf,guide',
            'content_id' => 'required|integer',
            'duration' => 'nullable|integer',
        ]);

        $lesson->update($data);

        return back()->with('success', 'Lección actualizada');
    }

    /**
     * ❌ Eliminar lección
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return back()->with('success', 'Lección eliminada');
    }

    /**
     * 🔄 Reordenar lecciones
     */
    public function reorder(Request $request)
    {
        foreach ($request->orders as $id => $order) {
            Lesson::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['status' => 'ok']);
    }

    public function preview(Lesson $lesson)
    {
        $lesson->load('module.course');

        return view('admin.lessons.preview', [
            'lesson' => $lesson,
            'course' => $lesson->module->course,
            'module' => $lesson->module,
            'resource' => $lesson->content_resource
        ]);
    }

    public function previewContent(Request $request)
    {
        $type = $request->type;
        $id = $request->id;

        if (!$type || !$id) {
            abort(404);
        }

        $resource = match ($type) {
            'video' => Video::find($id),
            'pdf', 'guide' => Content::find($id),
            default => null,
        };

        if (!$resource) {
            abort(404);
        }

        return view('admin.lessons.partials.preview-content', compact('resource', 'type'));
    }
    }