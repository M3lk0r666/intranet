<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * 📚 Listado de cursos
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * ➕ Form crear curso
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * 💾 Guardar curso
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();

        Course::create($data);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Curso creado correctamente');
    }

    /**
     * ✏️ Editar curso
     */
    public function edit(Course $course)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.courses.edit', compact('course','categories'));
    }

    /**
     * 🔄 Actualizar curso
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published',
        ]);

        $course->update($data);

        return back()->with('success', 'Curso actualizado');
    }

    /**
     * ❌ Eliminar curso
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Curso eliminado');
    }
}