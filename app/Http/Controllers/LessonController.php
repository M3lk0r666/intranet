<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        // 🔥 Cargar estructura completa
        $course->load([
            'category',
            'modules' => fn ($q) => $q->orderBy('order'),
            'modules.lessons' => fn ($q) => $q->orderBy('order'),
        ]);

        // 🔥 Validar que la lección pertenece al curso (extra seguridad)
        if ($lesson->module->course_id !== $course->id) {
            abort(404);
        }

        $lessons = $course->lessons->values();
        $currentIndex = $lessons->search(fn($l) => $l->id === $lesson->id);
        $prevLesson = $lessons[$currentIndex - 1] ?? null;
        $nextLesson = $lessons[$currentIndex + 1] ?? null;

        return view('intranet.courses.show', [
            'course' => $course,
            'lesson' => $lesson,
            'prevLesson' => $prevLesson,
            'nextLesson' => $nextLesson
        ]);
    }
}
