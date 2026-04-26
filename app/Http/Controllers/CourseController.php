<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query()
        ->with('category')
        ->where('status', 'published');

            // 🔍 Buscar
        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        // 📂 Categoría (por ID o slug)
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // 🔄 Orden
        match ($request->order) {
            'oldest' => $query->oldest(),
            default => $query->latest(),
        };

        $courses = $query->paginate(8)->withQueryString();

        // 🔥 CATEGORÍAS DINÁMICAS
        $categories = Category::orderBy('name')->get();

        return view('intranet.courses.index', compact('courses', 'categories'));
    }

    public function show(Course $course)
    {
        $course->load([
            'category',
            'modules' => fn ($q) => $q->orderBy('order'),
            'modules.lessons' => fn ($q) => $q->orderBy('order'),
        ]);

        // 👉 primera lección
        $firstLesson = $course->modules
            ->flatMap->lessons
            ->first();
    
        $lessons = $course->lessons->values();
        $lesson = $lessons->first();
        $currentIndex = 0;
        $prevLesson = null;
        $nextLesson = $lessons[$currentIndex + 1] ?? null;

        return view('intranet.courses.show', [
            'course' => $course,
            'lesson' => $firstLesson,
            'prevLesson' => $prevLesson,
            'nextLesson' => $nextLesson
        ]);
    }
}
