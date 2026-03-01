<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use App\Models\CatsVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class VideoController extends Controller
{
    // API para el frontend
    /* public function index(Request $request)
    {
        $query = Video::with('categories')->where('access_level', 'public');
        
        // Filtros
        if ($request->has('category')) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        if ($request->has('trending')) {
            $query->where('is_trending', true);
        }
        
        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }
        
        if ($request->has('free')) {
            $query->where('is_free', true);
        }
        
        // Ordenamiento
        $orderBy = $request->get('order_by', 'created_at');
        $orderDir = $request->get('order_dir', 'desc');
        $query->orderBy($orderBy, $orderDir);
        
        // Paginación
        $perPage = $request->get('per_page', 12);
        $videos = $query->paginate($perPage);
        
        return response()->json([
            'success' => true,
            'data' => $videos,
            'total' => $videos->total()
        ]);
    } */
    
   /*  public function show($slug)
    {
        $video = Video::with('categories')
            ->where('slug', $slug)
            ->where('access_level', 'public')
            ->firstOrFail();
        
        // Incrementar vistas
        $video->incrementViews();
        
        return response()->json([
            'success' => true,
            'data' => $video
        ]);
    } */
    
    /* public function categories()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('position')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }
     */
    /* public function stats()
    {
        $totalVideos = Video::where('access_level', 'public')->count();
        $totalViews = Video::sum('views');
        $totalHours = Video::sum(\DB::raw('TIME_TO_SEC(duration)')) / 3600;
        
        return response()->json([
            'success' => true,
            'data' => [
                'total_videos' => $totalVideos,
                'total_views' => $totalViews,
                'total_hours' => round($totalHours, 1)
            ]
        ]);
    } */

    /* public function testImage()
    {
        $manager = new ImageManager(new Driver());

        $img = $manager->create(100, 100)->fill('#ff0000');

        return response(
            $img->toPng()
        )->header('Content-Type', 'image/png');
    } */
    public function index()
    {
        // Solo videos públicos
        $videos = Video::with('catsvideo')
            ->where('access_level', 'public')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $catsvideos = CatsVideo::where('is_active', true)->get();
        return view('videos.index', compact('videos','catsvideos'));
            
        
            //return view('videos.index', compact('videos'));
    }

    public function show(Video $video)
    {
        // Mostrar detalle de un video
        if ($video->access_level !== 'public') {
            abort(403); // No autorizado
        }
        $catsvideos = CatsVideo::where('is_active', true)->get();
        return view('videos.show', compact('video', 'catsvideos'));
    }

}