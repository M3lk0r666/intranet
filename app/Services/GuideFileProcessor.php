<?php
// app/Services/GuideFileProcessor.php

namespace App\Services;

class GuideFileProcessor
{
    public function process(string $content, string $type): array
    {
        return match($type) {
            'txt' => $this->processTxt($content),
            'json' => $this->processJson($content),
            'md' => $this->processMarkdown($content),
            default => [],
        };
    }

    private function processTxt(string $content): array
    {
        $sections = [];
        $lines = explode("\n", $content);
        
        $currentSection = null;
        $currentStep = null;
        
        foreach ($lines as $line) {
            $line = trim($line);
            
            if (empty($line)) {
                continue; // Saltar líneas vacías
            }
            
            // Detectar secciones principales (# Título)
            if (preg_match('/^#\s+(.+)$/', $line, $matches)) {
                // Guardar sección anterior si existe
                if ($currentSection !== null) {
                    if ($currentStep !== null) {
                        $currentSection['steps'][] = $currentStep;
                        $currentStep = null;
                    }
                    $sections[] = $currentSection;
                }
                
                // Crear nueva sección
                $currentSection = [
                    'title' => $matches[1],
                    'steps' => [],
                ];
            }
            // Detectar subsecciones/pasos (## Subtítulo)
            elseif (preg_match('/^##\s+(.+)$/', $line, $matches) && $currentSection !== null) {
                // Guardar paso anterior si existe
                if ($currentStep !== null) {
                    $currentSection['steps'][] = $currentStep;
                }
                
                // Crear nuevo paso
                $currentStep = [
                    'title' => $matches[1],
                    'type' => 'text', // Por defecto es texto
                    'content' => '',
                    'items' => [],
                ];
            }
            // Detectar listas (- item)
            elseif (preg_match('/^-\s+(.+)$/', $line, $matches)) {
                if ($currentSection !== null) {
                    // Si no hay paso actual, crear uno para la lista
                    if ($currentStep === null || $currentStep['type'] !== 'list') {
                        if ($currentStep !== null) {
                            $currentSection['steps'][] = $currentStep;
                        }
                        $currentStep = [
                            'title' => '', // Sin título específico
                            'type' => 'list',
                            'content' => '',
                            'items' => [],
                        ];
                    }
                    
                    // Agregar item a la lista
                    $currentStep['items'][] = $matches[1];
                }
            }
            // Detectar comandos (> comando)
            elseif (preg_match('/^>\s+(.+)$/', $line, $matches)) {
                if ($currentSection !== null) {
                    // Si no hay paso actual, crear uno para comandos
                    if ($currentStep === null || $currentStep['type'] !== 'commands') {
                        if ($currentStep !== null) {
                            $currentSection['steps'][] = $currentStep;
                        }
                        $currentStep = [
                            'title' => 'Comandos', // Título por defecto
                            'type' => 'commands',
                            'content' => '',
                            'items' => [],
                        ];
                    }
                    
                    // Agregar comando a la lista
                    $currentStep['items'][] = $matches[1];
                }
            }
            // Detectar notas (Nota: texto)
            elseif (preg_match('/^Nota:\s*(.+)$/i', $line, $matches)) {
                if ($currentSection !== null) {
                    // Crear paso de nota
                    if ($currentStep !== null) {
                        $currentSection['steps'][] = $currentStep;
                    }
                    $currentStep = [
                        'title' => '',
                        'type' => 'note',
                        'content' => $matches[1],
                        'items' => null,
                    ];
                }
            }
            // Texto normal (sin prefijo especial)
            elseif ($currentSection !== null) {
                if ($currentStep === null) {
                    // Crear paso de texto si no hay uno
                    $currentStep = [
                        'title' => '',
                        'type' => 'text',
                        'content' => $line,
                        'items' => null,
                    ];
                } else {
                    // Si ya hay un paso, agregar al contenido
                    if ($currentStep['type'] === 'text' || $currentStep['type'] === 'note') {
                        if (!empty($currentStep['content'])) {
                            $currentStep['content'] .= "\n" . $line;
                        } else {
                            $currentStep['content'] = $line;
                        }
                    }
                    // Para listas y comandos, el texto se ignora (solo se usan los items)
                }
            }
        }
        
        // Guardar la última sección y paso
        if ($currentSection !== null) {
            if ($currentStep !== null) {
                $currentSection['steps'][] = $currentStep;
            }
            $sections[] = $currentSection;
        }
        
        return $sections;
    }

    private function processJson(string $content): array
    {
        $data = json_decode($content, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('JSON inválido: ' . json_last_error_msg());
        }
        
        return $data['sections'] ?? [];
    }

    private function processMarkdown(string $content): array
    {
        // Similar a TXT pero podrías usar un parser de Markdown
        return $this->processTxt($content); // Por ahora usa el mismo procesador
    }
    
    /**
     * Método mejorado para manejar casos complejos
     */
    public function processEnhanced(string $content, string $type): array
    {
        // Preprocesar el contenido
        $content = $this->normalizeLineEndings($content);
        $content = $this->removeBOM($content);
        
        return $this->process($content, $type);
    }
    
    private function normalizeLineEndings(string $content): string
    {
        // Convertir todos los saltos de línea a \n
        $content = str_replace(["\r\n", "\r"], "\n", $content);
        return $content;
    }
    
    private function removeBOM(string $content): string
    {
        // Eliminar Byte Order Mark si existe
        $bom = pack('H*', 'EFBBBF');
        $content = preg_replace("/^$bom/", '', $content);
        return $content;
    }
}