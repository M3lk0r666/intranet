<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\CatsVideo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class VideoController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth');
        $this->middleware('can:manage-videos'); */
    }
    
    public function index()
    {
        $videos = Video::with(['catsvideo', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        $catsvideos = CatsVideo::where('is_active', true)->get();

        //return $catsvideos;
        
        return view('admin.videos.index', compact('videos', 'catsvideos'));
    }
    
    public function create()
    {
        $catsvideos = CatsVideo::where('is_active', true)->get();
        return view('admin.videos.create', compact('catsvideos'));
    }
    
    public function store(Request $request)
    {
       #para revisar si todo lo que se envia es correcto
        //dd($request);
        
       // return $request->all();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_file' => 'required|file|mimes:mp4,mov,avi,wmv|max:512000', // 500MB
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:5120', // 5MB
            'duration' => 'required|date_format:H:i:s',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'catsvideos' => 'required|array',
            'catsvideos.*' => 'exists:cats_videos,id',
            'is_trending' => 'boolean',
            'is_free' => 'boolean',
            'is_featured' => 'boolean',
            'access_level' => 'required|in:public,private,premium'
        ]);
        
        // Generar slug único
        $slug = Str::slug($validated['title']);
        $count = Video::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        
        // Subir video
        $videoPath = $request->file('video_file')->store('videos', 'public');
        $videoUrl = Storage::url($videoPath);
        
        /* // Procesar y subir thumbnail
        $thumbnail = $request->file('thumbnail');
        $thumbnailName = 'thumb_' . time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnailPath = 'thumbnails/' . $thumbnailName;
      
                // Crear diferentes tamaños
        $image = Image::make($thumbnail);
                       
        // Tamaño grande (para el reproductor)
        $image->fit(1280, 720)->save(storage_path('app/public/' . $thumbnailPath));
        
        
        // Tamaño pequeño (para las cards)
        $smallThumbnailPath = 'thumbnails/small_' . $thumbnailName;
        $image->fit(400, 225)->save(storage_path('app/public/' . $smallThumbnailPath));
       
        /* $thumbnailUrl = Storage::url($thumbnailPath); */
        /*$thumbnailUrl = Storage::url($thumbnailPath); */

        // Procesar y subir thumbnail
        $thumbnail = $request->file('thumbnail');
        $thumbnailName = 'thumb_' . time() . '.jpg';
        $thumbnailPath = 'thumbnails/' . $thumbnailName;
        $smallThumbnailPath = 'thumbnails/small_' . $thumbnailName;


        // Crear manager (v3)
        $manager = new ImageManager(new Driver());

        // Crear directorios si no existen
        Storage::makeDirectory('public/thumbnails');
        Storage::makeDirectory('public/thumbnails/small');

        // Tamaño grande
        $manager->read($thumbnail->getPathname())
            ->cover(1280, 720)
            ->toJpeg(85)
            ->save(storage_path('app/public/' . $thumbnailPath));

        // Tamaño pequeño
        $manager->read($thumbnail->getPathname())
            ->cover(400, 225)
            ->toJpeg(85)
            ->save(storage_path('app/public/' . $smallThumbnailPath));

        // URL pública
        $thumbnailUrl = Storage::url($thumbnailPath);

        
        // Crear video
        $video = Video::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'],
            'short_description' => Str::limit($validated['description'], 150),
            'video_url' => $videoUrl,
            'thumbnail_url' => $thumbnailUrl,
            'duration' => $validated['duration'],
            'year' => $validated['year'],
            'is_trending' => $request->boolean('is_trending'),
            'is_free' => $request->boolean('is_free'),
            'is_featured' => $request->boolean('is_featured'),
            'access_level' => $validated['access_level'],
            'user_id' => auth()->id(),
            'metadata' => [
                'original_filename' => $request->file('video_file')->getClientOriginalName(),
                'file_size' => $request->file('video_file')->getSize(),
                'mime_type' => $request->file('video_file')->getMimeType(),
                'small_thumbnail' => Storage::url($smallThumbnailPath)
            ]
        ]);
        
        // Asignar categorías
        $video->catsvideo()->attach($validated['catsvideos']);
        
        return redirect()->route('admin.videos.index')
            ->with('success', 'Video creado exitosamente.');
    }
    
    public function edit(Video $video)
    {
        $catsvideos = CatsVideo::where('is_active', true)->get();
        $videoCategories = $video->catsvideo->pluck('id')->toArray();
        
        return view('admin.videos.edit', compact('video', 'catsvideos', 'videoCategories'));
    }
    
    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_file' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:512000',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'duration' => 'required|date_format:H:i:s',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'is_trending' => 'boolean',
            'is_free' => 'boolean',
            'is_featured' => 'boolean',
            'access_level' => 'required|in:public,private,premium'
        ]);
        
        // Actualizar slug si cambió el título
        if ($video->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $count = Video::where('slug', 'like', $slug . '%')
                ->where('id', '!=', $video->id)
                ->count();
            
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            
            $video->slug = $slug;
        }
        
        // Actualizar video si se subió uno nuevo
        if ($request->hasFile('video_file')) {
            // Eliminar video anterior
            $oldVideoPath = str_replace('/storage/', '', $video->video_url);
            Storage::disk('public')->delete($oldVideoPath);
            
            // Subir nuevo video
            $videoPath = $request->file('video_file')->store('videos', 'public');
            $video->video_url = Storage::url($videoPath);
            
            // Actualizar metadata
            $metadata = $video->metadata ?? [];
            $metadata['original_filename'] = $request->file('video_file')->getClientOriginalName();
            $metadata['file_size'] = $request->file('video_file')->getSize();
            $metadata['mime_type'] = $request->file('video_file')->getMimeType();
            $video->metadata = $metadata;
        }
        
        // Actualizar thumbnail si se subió uno nuevo
        if ($request->hasFile('thumbnail')) {
            // Eliminar thumbnails anteriores
            $oldThumbnailPath = str_replace('/storage/', '', $video->thumbnail_url);
            Storage::disk('public')->delete($oldThumbnailPath);
            
            if (isset($video->metadata['small_thumbnail'])) {
                $oldSmallThumbnailPath = str_replace('/storage/', '', $video->metadata['small_thumbnail']);
                Storage::disk('public')->delete($oldSmallThumbnailPath);
            }
            
            // Subir nuevo thumbnail
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = 'thumb_' . time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = 'thumbnails/' . $thumbnailName;
            
            $image = Image::make($thumbnail);
            
            // Tamaño grande
            $image->fit(1280, 720)->save(storage_path('app/public/' . $thumbnailPath));
            
            // Tamaño pequeño
            $smallThumbnailPath = 'thumbnails/small_' . $thumbnailName;
            $image->fit(400, 225)->save(storage_path('app/public/' . $smallThumbnailPath));
            
            $video->thumbnail_url = Storage::url($thumbnailPath);
            
            // Actualizar metadata
            $metadata = $video->metadata ?? [];
            $metadata['small_thumbnail'] = Storage::url($smallThumbnailPath);
            $video->metadata = $metadata;
        }
        
        // Actualizar otros campos
        $video->title = $validated['title'];
        $video->description = $validated['description'];
        $video->short_description = Str::limit($validated['description'], 150);
        $video->duration = $validated['duration'];
        $video->year = $validated['year'];
        $video->is_trending = $request->boolean('is_trending');
        $video->is_free = $request->boolean('is_free');
        $video->is_featured = $request->boolean('is_featured');
        $video->access_level = $validated['access_level'];
        
        $video->save();
        
        // Sincronizar categorías
        $video->categories()->sync($validated['categories']);
        
        return redirect()->route('admin.videos.index')
            ->with('success', 'Video actualizado exitosamente.');
    }
    
    public function destroy(Video $video)
    {
        // Eliminar archivos
        $videoPath = str_replace('/storage/', '', $video->video_url);
        $thumbnailPath = str_replace('/storage/', '', $video->thumbnail_url);
        
        Storage::disk('public')->delete([$videoPath, $thumbnailPath]);
        
        if (isset($video->metadata['small_thumbnail'])) {
            $smallThumbnailPath = str_replace('/storage/', '', $video->metadata['small_thumbnail']);
            Storage::disk('public')->delete($smallThumbnailPath);
        }
        
        $video->delete();
        
        return redirect()->route('admin.videos.index')
            ->with('success', 'Video eliminado exitosamente.');
    }

    public function testImage()
    {
        // Crear una imagen en memoria de 100x100 px de color rojo
        $img = Image::canvas(100, 100, '#ff0000'); 

        // Retornar la imagen como respuesta HTTP
        return response($img->encode('png'))
            ->header('Content-Type', 'image/png');
    }
}