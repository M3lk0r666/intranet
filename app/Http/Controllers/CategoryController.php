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
        /* $categories = Category::withCount('posts')->get(); */
        // Cargar posts paginados de esta categoría
        /* $posts = Post::where('category_id', $category->id)
            ->where('is_published', true)
            ->with(['user', 'tags'])
            ->latest()
            ->paginate(9); */ // 9 posts por página para grid 3x3

            $categories = Category::withCount([
                'posts' => function ($query) {
                    $query->where('is_published', true);
                }
            ])->get();

            $posts = $category->posts()
            ->where('is_published', true)
            ->with(['user', 'tags'])
            ->latest()
            ->paginate(9);

        return view('categories.show', compact('category', 'posts', 'categories'));
    }

}
