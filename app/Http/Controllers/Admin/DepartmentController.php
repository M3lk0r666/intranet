<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|unique:departments,name',
        ]);

        Department::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'El DEpartamento ha sido creado exitosamente'
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view ('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
        ]);

        $department->update($data);

        session()->flash('swal',[
                'icon' => 'success',
                'title' => '¡Buen hecho!',
                'text' => '¡El Departamento se ha actualizado con Exito!',
        ]);

        return redirect()->route('admin.departments.edit', $department);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Buen hecho!',
            'text' => '¡El Departamento se ha eliminado con Exito!',
        ]);

        return redirect()->route('admin.departments.index');
    }
}
