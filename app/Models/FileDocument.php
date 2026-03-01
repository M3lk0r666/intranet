<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileDocument extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'original_name',
        'file_name',
        'file_path',
        'extension',
        'mime_type',
        'size',
        'user_id',
        'downloads',
        'description',
        'category'
    ];

    protected $appends = ['formatted_size', 'icon', 'category_info'];

    // Obtener todas las categorías desde configuración
    public static function getCategories()
    {
        return config('documents.categories', []);
    }

    // Obtener claves de categorías para validación
    public static function getCategoryKeys()
    {
        return array_keys(self::getCategories());
    }

    // Obtener información de la categoría actual
    public function getCategoryInfoAttribute()
    {
        $categories = self::getCategories();
        
        if (isset($categories[$this->category])) {
            return (object) $categories[$this->category];
        }
        
        // Categoría por defecto si no existe
        return (object) [
            'name' => ucfirst($this->category),
            'color' => '#6c757d',
            'icon' => 'las la-folder',
            'description' => 'Categoría no definida'
        ];
    }

    // Accessor para icono
    public function getIconAttribute()
    {
        if (property_exists($this->category_info, 'icon')) {
            return $this->category_info->icon;
        }
        
        $icons = [
            'pdf' => 'las la-file-pdf',
            'doc' => 'las la-file-word',
            'docx' => 'las la-file-word',
            'xls' => 'las la-file-excel',
            'xlsx' => 'las la-file-excel',
            'ppt' => 'las la-file-powerpoint',
            'pptx' => 'las la-file-powerpoint',
            'txt' => 'ri-file-text-line',
            'zip' => 'las la-file-archive',
            'rar' => 'las la-file-archive',
        ];

        return $icons[$this->extension] ?? 'las la-file';
    }

    // Accessor para tamaño formateado
    public function getFormattedSizeAttribute()
    {
        $size = $this->size;
        $units = ['KB', 'MB', 'GB'];
        $unitIndex = 0;
        
        while ($size >= 1024 && $unitIndex < count($units) - 1) {
            $size /= 1024;
            $unitIndex++;
        }
        
        return round($size, 2) . ' ' . $units[$unitIndex];
    }

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope para filtrar por categoría
    public function scopeByCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }
        return $query;
    }

    // Scope para búsqueda
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%');
        });
    }
}