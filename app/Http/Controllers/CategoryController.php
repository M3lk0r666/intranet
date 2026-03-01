<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Mostrar posts de una categoría específica
     */
    public function show(Category $category)
    {
        $categories = Category::withCount('posts')->get();
        // Cargar posts paginados de esta categoría
        $posts = Post::where('category_id', $category->id)
            ->with(['user', 'tags'])
            ->latest()
            ->paginate(9); // 9 posts por página para grid 3x3

        return view('categories.show', compact('category', 'posts', 'categories'));
    }

}
