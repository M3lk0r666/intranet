<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Búsqueda en tiempo real (para API) - SOLO EN POSTS
     */
    public function liveSearch(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json(['results' => []]);
        }
        
        $results = collect();
        
        // Buscar SOLO en posts (título y contenido)
        $posts = Post::with(['user', 'categories', 'tags'])
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get()
            ->map(function ($post) use ($query) {
                return [
                    'id' => 'post_' . $post->id,
                    'type' => 'post',
                    'title' => $post->title,
                    'excerpt' => Str::limit(strip_tags($post->content), 100),
                    'image' => $post->image,
                    'author' => $post->user->name ?? 'Anónimo',
                    'date' => $post->created_at->format('d M, Y'),
                    'url' => route('posts.show', $post),
                    'matches' => ['post'] // Solo coincidencias en posts
                ];
            });
        
        $results = $results->merge($posts);
        
        return response()->json([
            'results' => $results->take(10),
            'total' => $results->count()
        ]);
    }
    
    /**
     * Página de resultados de búsqueda completa - SOLO EN POSTS
     */
    public function index(Request $request)
    {
        $query = $request->get('q', '');
        
        $posts = collect();
        $categories = Category::withCount('posts')->get();
        
        if (strlen($query) >= 2) {
            // Buscar SOLO en posts (título y contenido)
            $posts = Post::with(['user', 'categories', 'tags'])
                ->where(function ($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                      ->orWhere('content', 'LIKE', "%{$query}%");
                })
                ->latest()
                ->paginate(12);
        }
        
        return view('search.index', compact('query', 'posts', 'categories'));
    }
}