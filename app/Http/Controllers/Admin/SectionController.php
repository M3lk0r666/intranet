<?php
// app/Http/Controllers/Admin/SectionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\GuideSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guide_id' => 'required|exists:guides,id',
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'order' => 'integer|min:0',
        ]);

        // Si no se especifica orden, ponerlo al final
        if (!isset($validated['order'])) {
            $lastOrder = GuideSection::where('guide_id', $validated['guide_id'])
                ->max('order');
            $validated['order'] = $lastOrder + 1;
        }

        $section = GuideSection::create($validated);

        return redirect()
            ->route('admin.guides.edit', $validated['guide_id'])
            ->with('success', 'Sección creada exitosamente');
    }

    public function update(Request $request, GuideSection $section)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'order' => 'integer|min:0',
        ]);

        $section->update($validated);

        return redirect()
            ->route('admin.guides.edit', $section->guide_id)
            ->with('success', 'Sección actualizada exitosamente');
    }

    public function destroy(GuideSection $section)
    {
        $guideId = $section->guide_id;
        $section->delete();

        // Reordenar las secciones restantes
        $this->reorderSections($guideId);

        return redirect()
            ->route('admin.guides.edit', $guideId)
            ->with('success', 'Sección eliminada exitosamente');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'sections' => 'required|array',
            'sections.*.id' => 'required|exists:guide_sections,id',
            'sections.*.order' => 'required|integer|min:0',
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->sections as $sectionData) {
                GuideSection::where('id', $sectionData['id'])
                    ->update(['order' => $sectionData['order']]);
            }

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    private function reorderSections($guideId)
    {
        $sections = GuideSection::where('guide_id', $guideId)
            ->orderBy('order')
            ->get();

        foreach ($sections as $index => $section) {
            $section->order = $index;
            $section->save();
        }
    }
}