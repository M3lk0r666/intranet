<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view ('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #para revisar si todo lo que se envia es correcto
        //dd($request);
        
        //return $request->all();

        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data['user_id'] = auth()->id();
        $post = Post::create($data);

        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'El Post se ha creado correctamente',
        ]);

        //return redirect()->route('admin.posts.edit', $post);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //dd($request);
        //return $request->all();
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'is_published' => 'required|boolean',
            'image_path' => 'nullable|image',
            'content' => 'nullable', 
        ]);
         
        //return $data;
    
        /* if($request->hasFile('image_path')){
            if($post->image_path){
                Storage::delete($post->image_path);
            }
            $data['image_path'] = Storage::put('posts', $request->image_path);
        } */
        if ($request->hasFile('image_path')) {

            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
        
            $data['image_path'] = $request->file('image_path')->store('posts', 'public');
        }
      
        $post->update($data);

        $post->tags()->sync($data['tags'] ?? []);

        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'El Post se ha actualizado correctamente',
        ]);

        //return redirect()->route('admin.posts.edit', $post->slug);
        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image_path){
            Storage::delete($post->image_path);
        }

        $post->delete();
        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Buen hecho!',
            'text' => '¡El Post se ha eliminado con Exito!',
        ]);

        return redirect()->route('admin.posts.index');
    }

    
}
