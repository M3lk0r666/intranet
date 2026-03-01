<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|unique:tags,name',
        ]);

        Tag::create(['name'=> $request->name]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'La Etqueta ha sido creada exitosamente'
        ]);
        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view ('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
        ]);

        $tag->update($data);

        session()->flash('swal',[
                'icon' => 'success',
                'title' => '¡Buen hecho!',
                'text' => '¡El Tag se ha actualizado con Exito!',
        ]);

        return redirect()->route('admin.tags.edit', $tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Buen hecho!',
            'text' => '¡La Etiqueta se ha eliminado con Exito!',
        ]);

        return redirect()->route('admin.tags.index');
    }
}
