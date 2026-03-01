<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Video;

class VideoTable extends DataTableComponent
{
    protected $model = Video::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        /* ->setTableRowUrl(function($row) {
            // Puedes mantener esto si quieres que las filas sean clickeables
            return null;
        }) */
        ->setTableAttributes([
            'class' => 'table table-hover',
        ])
        ->setDefaultSort('created_at', 'desc')
        ->setEagerLoadAllRelationsEnabled();;
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make("Miniatura", "thumbnail_url")
            ->format(function ($value, $row) {
                if ($row->thumbnail_url) {
                    return '<img src="' . e($row->thumbnail_url) . '" 
                            alt="' . e($row->title) . '"
                            class="img-thumbnail"
                            style="width: 80px; height: 45px; object-fit: cover;">';
                }
                return '<div class="h-12 w-20 bg-gray-200 flex items-center justify-center rounded">
                            <i class="fas fa-video text-gray-400"></i>
                        </div>';
            })
            ->html()
            ->unclickable(),
           /*  Column::make("Titulo", "titulo")
                ->sortable(), */
            Column::make("Título", "titulo")
            ->sortable()
            ->searchable()
            ->format(function ($value, $row) {
                return '<div>
                            <strong>' . e($row->titulo) . '</strong><br>
                        </div>';
            })
            ->html(),
            /* Column::make("Slug", "slug")
                ->sortable(), */
            Column::make("Descripcion", "descripcion")
                ->sortable(),
            /* Column::make("Video url", "video_url")
                ->sortable(), */
            /* Column::make("Thumbnail url", "thumbnail_url")
                ->sortable(), */
           /*  Column::make("Categoria", "category_id")
                ->sortable(), */
            Column::make('Categorías', 'id')
            ->format(function ($value, $row, $column) {
                $categories = $row->videos; // Asegúrate de que la relación esté cargada
                
                if ($categories === null || $categories->isEmpty()) {
                    return '<span class="text-gray-400 text-sm dark:text-gray-500">Sin categorías</span>';
                }
                
                $badges = '';
                foreach ($categories as $category) {
                    $badges .= '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 mr-1 mb-1">' 
                            . e($category->name) . '</span>';
                }
                return $badges;
            })
            ->html(),
            /* Column::make("User id", "user_id")
                ->sortable(), */
            Column::make('Usuario', 'user_id')
            ->sortable()
            ->format(function ($value, $row, $column) {
                $video = $row; // $row es tu modelo Video
                $html = '';
                
                if ($video->user) {
                    $html = '<div class="flex items-center">';
                    $html .= '<div class="flex-shrink-0">';
                    $html .= '<div class="w-8 h-8 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">';
                    
                    if ($video->user->profile_photo_path) {
                        $html .= '<img src="' . e($video->user->profile_photo_url) . '" ';
                        $html .= 'alt="' . e($video->user->name) . '" ';
                        $html .= 'class="w-8 h-8 rounded-full object-cover">';
                    } else {
                        $html .= '<span class="text-sm font-medium text-gray-600 dark:text-gray-300">';
                        $html .= e(substr($video->user->name, 0, 1));
                        $html .= '</span>';
                    }
                    
                    $html .= '</div></div>';
                    $html .= '<div class="ml-3">';
                    $html .= '<p class="text-sm font-medium text-gray-900 dark:text-white">';
                    $html .= e($video->user->name);
                    $html .= '</p>';
                    $html .= '<p class="text-xs text-gray-500 dark:text-gray-400">';
                    $html .= e($video->created_at->format('d/m/Y'));
                    $html .= '</p>';
                    $html .= '</div></div>';
                } else {
                    $html = '<span class="text-gray-400 text-sm">Usuario eliminado</span>';
                }
                
                return $html;
            })
            ->html(),
            Column::make("Activo", "activo")
                ->sortable(),
            /* Column::make("Orden", "orden")
                ->sortable(), */
            Column::make("Vistas", "vistas")
                ->sortable(),
            Column::make("Fecha Creacion", "created_at")
            ->sortable()
            ->format(function($value){
                return $value->format('d/m/Y');
            }),
            Column::make('Acciones')
            ->label(function($row){
                return view('admin.videos.actions', [
                    'post' => $row
                ]);
            })
        ];
    }
}
