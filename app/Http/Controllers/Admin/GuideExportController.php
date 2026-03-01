<?php
// app/Http/Controllers/Admin/GuideExportController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideExportController extends Controller
{
    public function export(Guide $guide, Request $request)
    {
        $format = $request->get('format', 'txt');
        
        $guide->load(['sections.steps']);
        
        $content = $this->generateContent($guide, $format);
        
        $filename = "guia-{$guide->slug}-" . date('Y-m-d') . ".{$format}";
        
        return response($content)
            ->header('Content-Type', $this->getContentType($format))
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }
    
    private function generateContent(Guide $guide, string $format): string
    {
        switch ($format) {
            case 'json':
                return $this->generateJson($guide);
            case 'txt':
            default:
                return $this->generateTxt($guide);
        }
    }
    
    private function generateTxt(Guide $guide): string
    {
        $content = "# {$guide->title}\n";
        
        if ($guide->description) {
            $content .= "{$guide->description}\n\n";
        }
        
        foreach ($guide->sections as $section) {
            $content .= "\n# {$section->title}\n";
            
            foreach ($section->steps as $step) {
                if ($step->title) {
                    $content .= "\n## {$step->title}\n";
                }
                
                switch ($step->content_type) {
                    case 'text':
                        $content .= "{$step->content}\n";
                        break;
                        
                    case 'list':
                        $items = json_decode($step->items, true);
                        if ($items) {
                            foreach ($items as $item) {
                                $content .= "- {$item}\n";
                            }
                        }
                        break;
                        
                    case 'commands':
                        $items = json_decode($step->items, true);
                        if ($items) {
                            foreach ($items as $item) {
                                $content .= "> {$item}\n";
                            }
                        }
                        break;
                        
                    case 'note':
                        $content .= "Nota: {$step->content}\n";
                        break;
                }
            }
        }
        
        return $content;
    }
    
    private function generateJson(Guide $guide): string
    {
        $data = [
            'title' => $guide->title,
            'description' => $guide->description,
            'sections' => []
        ];
        
        foreach ($guide->sections as $section) {
            $sectionData = [
                'title' => $section->title,
                'icon' => $section->icon,
                'order' => $section->order,
                'steps' => []
            ];
            
            foreach ($section->steps as $step) {
                $stepData = [
                    'title' => $step->title,
                    'content_type' => $step->content_type,
                    'content' => $step->content,
                    'order' => $step->order,
                ];
                
                if ($step->items) {
                    $stepData['items'] = json_decode($step->items, true);
                }
                
                $sectionData['steps'][] = $stepData;
            }
            
            $data['sections'][] = $sectionData;
        }
        
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    
    private function getContentType(string $format): string
    {
        return match($format) {
            'json' => 'application/json',
            'txt' => 'text/plain',
            default => 'text/plain',
        };
    }
}