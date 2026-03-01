<?php
// app/Http/Controllers/Admin/StepController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuideStep;
use App\Models\GuideSection;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guide_section_id' => 'required|exists:guide_sections,id',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_type' => 'required|in:text,list,commands,note',
            'items' => 'nullable|string',
            'order' => 'integer|min:0',
        ]);

        // Procesar items si es necesario
        if (in_array($validated['content_type'], ['list', 'commands']) && !empty($validated['items'])) {
            $items = explode("\n", $validated['items']);
            $items = array_map('trim', $items);
            $items = array_filter($items); // Eliminar líneas vacías
            $validated['items'] = json_encode($items);
        } else {
            $validated['items'] = null;
        }

        // Si no se especifica orden, ponerlo al final
        if (!isset($validated['order'])) {
            $lastOrder = GuideStep::where('guide_section_id', $validated['guide_section_id'])
                ->max('order');
            $validated['order'] = $lastOrder + 1;
        }

        $step = GuideStep::create($validated);
        $section = GuideSection::find($validated['guide_section_id']);

        return redirect()
            ->route('admin.guides.edit', $section->guide_id)
            ->with('success', 'Paso creado exitosamente');
    }

    public function update(Request $request, GuideStep $step)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_type' => 'required|in:text,list,commands,note',
            'items' => 'nullable|string',
            'order' => 'integer|min:0',
        ]);

        // Procesar items si es necesario
        if (in_array($validated['content_type'], ['list', 'commands']) && !empty($validated['items'])) {
            $items = explode("\n", $validated['items']);
            $items = array_map('trim', $items);
            $items = array_filter($items); // Eliminar líneas vacías
            $validated['items'] = json_encode($items);
        } else {
            $validated['items'] = null;
        }

        $step->update($validated);

        return redirect()
            ->route('admin.guides.edit', $step->section->guide_id)
            ->with('success', 'Paso actualizado exitosamente');
    }

    public function destroy(GuideStep $step)
    {
        $guideId = $step->section->guide_id;
        $step->delete();

        // Reordenar los pasos restantes
        $this->reorderSteps($step->guide_section_id);

        return redirect()
            ->route('admin.guides.edit', $guideId)
            ->with('success', 'Paso eliminado exitosamente');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'step_id' => 'required|exists:guide_steps,id',
            'order' => 'required|integer|min:0',
        ]);

        $step = GuideStep::find($request->step_id);
        $step->order = $request->order;
        $step->save();

        // Reordenar todos los pasos de la sección
        $this->reorderSteps($step->guide_section_id);

        return response()->json(['success' => true]);
    }

    private function reorderSteps($sectionId)
    {
        $steps = GuideStep::where('guide_section_id', $sectionId)
            ->orderBy('order')
            ->get();

        foreach ($steps as $index => $step) {
            $step->order = $index;
            $step->save();
        }
    }
}