<?php
// app/Http/Controllers/GuideController.php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Mostrar listado de guías activas
     */
    public function index()
    {
        $guides = Guide::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        return view('guides.index', compact('guides'));
    }

    /**
     * Mostrar una guía específica
     */
    public function show($slug)
    {
        $guide = Guide::where('slug', $slug)
            ->where('is_active', true)
            ->with(['sections' => function($query) {
                $query->orderBy('order')->with(['steps' => function($q) {
                    $q->orderBy('order');
                }]);
            }])
            ->firstOrFail();
        
        // Obtener guías relacionadas (mismo tema)
        $relatedGuides = Guide::where('is_active', true)
            ->where('id', '!=', $guide->id)
            ->where(function($query) use ($guide) {
                // Buscar guías con palabras similares en el título
                $keywords = explode(' ', $guide->title);
                foreach ($keywords as $keyword) {
                    if (strlen($keyword) > 3) {
                        $query->orWhere('title', 'like', "%{$keyword}%");
                    }
                }
            })
            ->limit(3)
            ->get();
        
        // Incrementar contador de visitas
        $guide->increment('views_count');
        
        return view('guides.show', compact('guide', 'relatedGuides'));
    }

    /**
     * Buscar guías
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        $guides = Guide::where('is_active', true)
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12)
            ->appends(['q' => $query]);
        
        return view('guides.search', compact('guides', 'query'));
    }

    /**
     * Descargar guía en formato TXT
     */
    public function download($slug)
    {
        $guide = Guide::where('slug', $slug)
            ->where('is_active', true)
            ->with(['sections.steps'])
            ->firstOrFail();
        
        $content = $this->generateDownloadContent($guide);
        
        $filename = "guia-{$guide->slug}-" . date('Y-m-d') . ".txt";
        
        return response($content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }
    
    private function generateDownloadContent(Guide $guide): string
    {
        $content = "GUÍA: {$guide->title}\n";
        $content .= "=" . str_repeat("=", strlen($guide->title)) . "=\n\n";
        
        if ($guide->description) {
            $content .= "{$guide->description}\n\n";
        }
        
        $content .= "Fecha de generación: " . date('d/m/Y H:i') . "\n";
        $content .= str_repeat("-", 60) . "\n\n";
        
        foreach ($guide->sections as $section) {
            $content .= "SECCIÓN: {$section->title}\n";
            $content .= str_repeat("-", strlen($section->title) + 9) . "\n\n";
            
            foreach ($section->steps as $step) {
                if ($step->title) {
                    $content .= "► {$step->title}\n";
                }
                
                switch ($step->content_type) {
                    case 'text':
                        $content .= "{$step->content}\n\n";
                        break;
                        
                    case 'list':
                        $items = json_decode($step->items, true);
                        if ($items) {
                            foreach ($items as $item) {
                                $content .= "• {$item}\n";
                            }
                            $content .= "\n";
                        }
                        break;
                        
                    case 'commands':
                        $items = json_decode($step->items, true);
                        if ($items) {
                            foreach ($items as $item) {
                                $content .= "> {$item}\n";
                            }
                            $content .= "\n";
                        }
                        break;
                        
                    case 'note':
                        $content .= "📌 NOTA: {$step->content}\n\n";
                        break;
                }
            }
            $content .= "\n";
        }
        
        $content .= str_repeat("=", 60) . "\n";
        $content .= "Fin de la guía\n";
        
        return $content;
    }
}