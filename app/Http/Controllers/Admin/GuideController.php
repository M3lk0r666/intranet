<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\GuideFile;
use App\Models\GuideSection;
use App\Models\GuideStep;
use Illuminate\Http\Request;
use App\Services\GuideFileProcessor;


class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Usar withCount para optimizar consultas
        $guides = Guide::withCount('sections')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.guides.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
        
        $validated['slug'] = \Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');
        
        $guide = Guide::create($validated);
        
        return redirect()
            ->route('admin.guides.edit', $guide)
            ->with('success', 'Guía creada exitosamente. Ahora puedes agregar contenido.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Guide $guide)
    {
        $guide->load(['sections.steps']);
        return view('admin.guides.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guide $guide)
    {
        $guide->load(['sections.steps']);
        return view('admin.guides.edit', compact('guide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guide $guide)
    {
        // Lógica para actualizar guía
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        
        return redirect()
            ->route('admin.guides.index')
            ->with('success', 'Guía eliminada exitosamente.');
    }

    // Nueva función para mostrar formulario de importación
    public function importForm(Guide $guide)
    {
        $guide->load(['files', 'sections']);
        return view('admin.guides.import', compact('guide'));
    }

    // Procesar importación
    public function importProcess(Request $request, Guide $guide)
    {
        $request->validate([
            'file' => 'required|file|mimes:txt,json,md|max:5120', // 5MB máximo
            'replace_content' => 'boolean',
            'auto_generate_icons' => 'boolean',
        ]);

        try {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            
            // Guardar archivo
            $path = $file->store('guide-imports', 'public');
            
            // Procesar contenido
            $content = file_get_contents($file->getRealPath());
            $processor = new GuideFileProcessor();
            $sectionsData = $processor->process($content, $extension);
            
            // Eliminar contenido existente si se solicitó
            if ($request->has('replace_content') && $guide->sections()->count() > 0) {
                $guide->sections()->delete();
            }
            
            // Guardar secciones y pasos
            $this->saveSectionsToGuide($guide, $sectionsData, $request->has('auto_generate_icons'));
            
            // ✅ CORRECCIÓN: Registrar archivo importado con guide_id
            GuideFile::create([
                'guide_id' => $guide->id, // ¡ESTO ES LO QUE FALTA!
                'file_path' => $path,
                'file_type' => $extension,
            ]);
            
            return redirect()
                ->route('admin.guides.edit', $guide)
                ->with('success', 'Contenido importado exitosamente. ' . count($sectionsData) . ' secciones procesadas.');
                
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Error al importar: ' . $e->getMessage());
        }
    }
    
    private function saveSectionsToGuide($guide, $sectionsData, $autoGenerateIcons = true)
    {
        $iconMap = [
            'previas' => 'clipboard-check',
            'cambio' => 'exchange-alt',
            'verificacion' => 'check-double',
            'finales' => 'clipboard-list',
            'rollback' => 'undo-alt',
            'configuración' => 'cog',
            'configuracion' => 'cog', // Sin acento
            'red' => 'network-wired',
            'seguridad' => 'shield-alt',
            'implementación' => 'network-wired',
            'implementacion' => 'network-wired',
            'actividades' => 'tasks',
            'verificación' => 'check-circle',
            'operatividad' => 'play-circle',
        ];
        
        foreach ($sectionsData as $index => $sectionData) {
            $icon = 'list-alt'; // Icono por defecto
            
            if ($autoGenerateIcons) {
                $sectionTitleLower = mb_strtolower($sectionData['title'], 'UTF-8');
                foreach ($iconMap as $keyword => $iconName) {
                    if (str_contains($sectionTitleLower, $keyword)) {
                        $icon = $iconName;
                        break;
                    }
                }
            }
            
            $section = $guide->sections()->create([
                'title' => $sectionData['title'],
                'order' => $index,
                'icon' => $icon,
            ]);
            
            if (!empty($sectionData['steps'])) {
                foreach ($sectionData['steps'] as $stepIndex => $stepData) {
                    // Asegurar que items sea null si está vacío
                    $items = null;
                    if (!empty($stepData['items']) && is_array($stepData['items'])) {
                        $items = json_encode($stepData['items'], JSON_UNESCAPED_UNICODE);
                    }
                    
                    $section->steps()->create([
                        'title' => $stepData['title'] ?? '',
                        'content' => $stepData['content'] ?? null,
                        'content_type' => $stepData['type'] ?? 'text',
                        'items' => $items,
                        'order' => $stepIndex,
                    ]);
                }
            }
        }
    }

    // Eliminar archivo importado
    public function deleteFile(GuideFile $file)
    {
        Storage::delete('public/' . $file->file_path);
        $file->delete();
        
        return back()->with('success', 'Archivo eliminado exitosamente.');
    }
}
