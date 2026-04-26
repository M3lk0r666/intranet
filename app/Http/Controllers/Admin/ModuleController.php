<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Course;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * ➕ Crear módulo (dentro de un curso)
     */
    public function create(Request $request)
    {
        $course = Course::findOrFail($request->course_id);

        return view('admin.modules.create', compact('course'));
    }

    /**
     * 💾 Guardar módulo
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
        ]);

        $data['order'] = Module::where('course_id', $data['course_id'])->max('order') + 1;

        Module::create($data);

        return back()->with('success', 'Módulo creado');
    }

    /**
     * ✏️ Editar módulo
     */
    public function edit(Module $module)
    {
        return view('admin.modules.edit', compact('module'));
    }

    /**
     * 🔄 Actualizar módulo
     */
    public function update(Request $request, Module $module)
    {
        $module->update($request->validate([
            'title' => 'required|string|max:255',
        ]));

        return back()->with('success', 'Módulo actualizado');
    }

    /**
     * ❌ Eliminar módulo
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return back()->with('success', 'Módulo eliminado');
    }

    /**
     * 🔄 Reordenar módulos
     */
    public function reorder(Request $request)
    {
        foreach ($request->orders as $id => $order) {
            Module::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['status' => 'ok']);
    }
}