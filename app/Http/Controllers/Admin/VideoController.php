<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Video::with(['category', 'user', 'tags'])->latest();

        // Filtro por búsqueda
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filtro por categoría
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filtro por estado
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $videos = $query->paginate(10);
        $categories = Category::all();

        return view('admin.videos.index', compact('videos', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.videos.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_type' => 'required|in:url,uploaded',
            'video_url' => 'required_if:video_type,url|nullable|url',
            'video_file' => 'required_if:video_type,uploaded|nullable|file|mimes:mp4,avi,mov,wmv,flv,webm,mkv|max:512000', // Max 500MB
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'status' => 'required|in:draft,published,archived'
        ]);

        // Generar slug único
        $slug = Str::slug($request->title);
        $counter = 1;
        while (Video::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->title) . '-' . $counter;
            $counter++;
        }

        $videoData = [
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'user_id' => auth()->id(),
            'video_type' => $request->video_type
        ];

        // Procesar video según el tipo
        if ($request->video_type === 'url') {
            $videoData['video_url'] = $request->video_url;
        } elseif ($request->video_type === 'uploaded' && $request->hasFile('video_file')) {
            $videoFile = $request->file('video_file');
            
            // Guardar video
            $videoPath = $videoFile->store('videos', 'public');
            $videoData['video_path'] = $videoPath;
            $videoData['original_filename'] = $videoFile->getClientOriginalName();
            $videoData['file_size'] = $videoFile->getSize();
            $videoData['file_type'] = $videoFile->getMimeType();
            
            // Generar thumbnail automáticamente si no se sube uno
            if (!$request->hasFile('thumbnail')) {
                $thumbnailPath = $this->generateThumbnailFromVideo($videoFile);
                if ($thumbnailPath) {
                    $videoData['thumbnail_path'] = $thumbnailPath;
                }
            }
        }

        // Procesar thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->store('thumbnails', 'public');
            
            // Optimizar thumbnail
            $this->optimizeThumbnail($thumbnailPath);
            
            $videoData['thumbnail_path'] = $thumbnailPath;
        }

        $video = Video::create($videoData);

        // Asociar tags
        if ($request->has('tags')) {
            $video->tags()->sync($request->tags);
        }

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video creado exitosamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        $video->load(['category', 'user', 'tags']);
        
        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $videoTags = $video->tags->pluck('id')->toArray();
        
        return view('admin.videos.edit', compact('video', 'categories', 'tags', 'videoTags'));
    }

    /**
     * Update the specified resource in storage.
     */
   
     public function update(Request $request, Video $video)
     {
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'nullable|string',
             'video_type' => 'required|in:url,uploaded',
             'video_url' => 'required_if:video_type,url|nullable|url',
             'video_file' => 'required_if:video_type,uploaded|nullable|file|mimes:mp4,avi,mov,wmv,flv,webm,mkv|max:512000',
             'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
             'category_id' => 'required|exists:categories,id',
             'tags' => 'nullable|array',
             'tags.*' => 'exists:tags,id',
             'status' => 'required|in:draft,published,archived'
         ]);
 
         $videoData = [
             'title' => $request->title,
             'description' => $request->description,
             'category_id' => $request->category_id,
             'status' => $request->status,
             'video_type' => $request->video_type
         ];
 
         // Generar nuevo slug si cambió el título
         if ($video->title != $request->title) {
             $slug = Str::slug($request->title);
             $counter = 1;
             while (Video::where('slug', $slug)->where('id', '!=', $video->id)->exists()) {
                 $slug = Str::slug($request->title) . '-' . $counter;
                 $counter++;
             }
             $videoData['slug'] = $slug;
         }
 
         // Procesar video
         if ($request->video_type === 'url') {
             // Si cambia de subido a URL, eliminar archivos antiguos
             if ($video->video_type === 'uploaded' && $video->video_path) {
                 Storage::disk('public')->delete($video->video_path);
                 $videoData['video_path'] = null;
                 $videoData['original_filename'] = null;
                 $videoData['file_size'] = null;
                 $videoData['file_type'] = null;
             }
             $videoData['video_url'] = $request->video_url;
             
         } elseif ($request->video_type === 'uploaded' && $request->hasFile('video_file')) {
             // Si cambia de URL a subido o actualiza video
             if ($video->video_path) {
                 Storage::disk('public')->delete($video->video_path);
             }
             
             $videoFile = $request->file('video_file');
             $videoPath = $videoFile->store('videos', 'public');
             
             $videoData['video_path'] = $videoPath;
             $videoData['original_filename'] = $videoFile->getClientOriginalName();
             $videoData['file_size'] = $videoFile->getSize();
             $videoData['file_type'] = $videoFile->getMimeType();
             $videoData['video_url'] = null;
         }
 
         // Procesar thumbnail
         if ($request->hasFile('thumbnail')) {
             // Eliminar thumbnail anterior si existe
             if ($video->thumbnail_path) {
                 Storage::disk('public')->delete($video->thumbnail_path);
             } elseif ($video->thumbnail_url) {
                 // Si era URL externa, mantener pero limpiar campo
                 $videoData['thumbnail_url'] = null;
             }
             
             $thumbnail = $request->file('thumbnail');
             $thumbnailPath = $thumbnail->store('thumbnails', 'public');
             
             // Optimizar thumbnail
             $this->optimizeThumbnail($thumbnailPath);
             
             $videoData['thumbnail_path'] = $thumbnailPath;
         } elseif ($request->has('remove_thumbnail')) {
             // Si el usuario quiere eliminar el thumbnail
             if ($video->thumbnail_path) {
                 Storage::disk('public')->delete($video->thumbnail_path);
                 $videoData['thumbnail_path'] = null;
             }
             $videoData['thumbnail_url'] = null;
         }
 
         $video->update($videoData);
 
         // Sincronizar tags
         $video->tags()->sync($request->tags ?? []);
 
         return redirect()->route('admin.videos.index')
             ->with('success', 'Video actualizado exitosamente.');
     }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(Video $video)
    {
        // Eliminar archivos si existen
        if ($video->video_path) {
            Storage::disk('public')->delete($video->video_path);
        }
        
        if ($video->thumbnail_path) {
            Storage::disk('public')->delete($video->thumbnail_path);
        }

        $video->delete();

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video eliminado exitosamente.');
    }

    private function generateThumbnailFromVideo($videoFile)
    {
        // Esta función requiere FFmpeg instalado en el servidor
        // Puedes usar la librería "php-ffmpeg/php-ffmpeg"
        
        // Alternativa simple: usar una imagen por defecto
        // o extraer el primer frame si FFmpeg está disponible
        
        // Por ahora, retornamos null y usaremos una imagen por defecto en la vista
        return null;
    }

    private function optimizeThumbnail($thumbnailPath)
    {
        try {
            $fullPath = storage_path('app/public/' . $thumbnailPath);
            
            // Redimensionar a máximo 800x450 (16:9)
            $image = Image::make($fullPath);
            $image->resize(800, 450, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            
            // Guardar optimizado
            $image->save($fullPath, 80); // Calidad 80%
            
        } catch (\Exception $e) {
            \Log::error('Error optimizando thumbnail: ' . $e->getMessage());
        }
    }
}
