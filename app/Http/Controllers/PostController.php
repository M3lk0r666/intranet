<?php

namespace App\Http\Controllers;

use App\Models\Post;
//use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\HtmlHelper;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posts = Post::where('is_published', true)->orderBy('published_at', 'desc')->paginate(10);

        //return $posts;
        
        //return view('posts.index', compact('posts'));

        $categories = Category::withCount('posts')->get();
        $posts = Post::where('is_published', true)->orderBy('published_at', 'desc')->paginate(10);
   
        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //return view('posts.show', compact('post'));

        //

        $categories = Category::withCount('posts')->get();
        $similarPosts = Post::where('id', '!=', $post->id)
                            ->where('category_id', $post->category_id)
                            ->orWhereHas('tags', function($query) use ($post) {
                                $query->whereIn('name', $post->tags->pluck('name'));
                            })
                            ->limit(5)
                            ->get();

        //return $similarPosts;
        
        $parsed = HtmlHelper::generateTableOfContents($post->content);


        //return view('posts.show', compact('post', 'similarPosts', 'categories'));
        return view('posts.show', [
            'post' => $post,
            'similarPosts' => $similarPosts,
            'categories' => $categories,
            'content' => $parsed['content'],
            'toc' => $parsed['toc'],]);
    }

    public function downloadPDF(Post $post)
    {
        // Cargar relaciones necesarias
        $post->load(['user', 'categories', 'tags']);
        
        // Opción 1: Descargar directamente
        $pdf = Pdf::setOptions(['isRemoteEnabled' => true])->loadView('posts.pdf', compact('post'));
        
        // Configurar el papel (opcional)
        $pdf->setPaper('A4', 'portrait');
        
        // Opción A: Descargar con nombre personalizado
        $filename = Str::slug($post->title) . '.pdf';
        
        return $pdf->download($filename);
        
        // Opción B: Mostrar en el navegador
        // return $pdf->stream($filename);
        
        // Opción C: Guardar en storage y luego descargar
        // $pdf->save(storage_path("app/public/pdfs/{$filename}"));
        // return response()->download(storage_path("app/public/pdfs/{$filename}"));
    }
    
    /**
     * Vista previa del PDF
     */
    public function previewPDF(Post $post)
    {

        $post->load(['user', 'categories', 'tags']);
        $pdf = Pdf::setOptions(['isRemoteEnabled' => true])->loadView('posts.pdf', compact('post'));
        $pdf->setPaper('A4', 'portrait');
        
        return $pdf->stream(Str::slug($post->title) . '.pdf');
    }

  

    
}
