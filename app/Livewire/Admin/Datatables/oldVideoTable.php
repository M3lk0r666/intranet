<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Video;

class VideoTable extends DataTableComponent
{
    protected $model = Video::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                // Puedes mantener esto si quieres que las filas sean clickeables
                return null;
            })
            ->setTableAttributes([
                'class' => 'table table-hover',
            ])
            ->setDefaultSort('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
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

            Column::make("Título", "title")
                ->sortable()
                ->searchable()
                ->format(function ($value, $row) {
                    return '<div>
                                <strong>' . e($row->title) . '</strong><br>
                                <small class="text-muted">' . e($row->year) . '</small>
                            </div>';
                })
                ->html(),

            Column::make("Categorías", "id")
                ->label(function($row) {
                    $categories = $row->catsvideo;
                    
                    if ($categories === null || $categories->isEmpty()) {
                        return '<span class="text-muted">Sin categorías</span>';
                    }
                    
                    $badges = '';
                    foreach ($categories as $category) {
                        $badges .= '<span class="badge badge-primary mr-1 mb-1">' 
                                 . e($category->name) . '</span>';
                    }
                    return $badges;
                    
                    })
                
                ->html(),

            Column::make("Vistas", "views")
                ->sortable()
                ->format(function ($value) {
                    return number_format($value);
                }),

            Column::make("Duración", "duration")
                ->sortable()
                ->searchable(),

            Column::make("Estado", "id")
                ->label(function($row) {
                    $badges = '';
                    
                    if ($row->is_trending) {
                        $badges .= '<span class="badge badge-success mr-1">Trending</span>';
                    }
                    
                    if ($row->is_featured) {
                        $badges .= '<span class="badge badge-info mr-1">Destacado</span>';
                    }
                    
                    return $badges;
                })
                ->html(),
            Column::make("Nivel de Acceso", "id")
                ->label(function($row){
                    $badges = '';               
                    
                    // O usando array:
                     $accessClasses = ['public' => 'success', 'private' => 'warning', 'premium' => 'danger'];
                     $accessClass = $accessClasses[$row->access_level] ?? 'secondary';
                    
                    /* $badges .= '<span class="bg-' . $accessClass . '-soft text-fg-warning text-sm font-medium px-2 py-1 rounded">' 
                            . e(ucfirst($row->access_level)) . '</span>'; */

                            $badges .= '<span class="badge badge-' . $accessClass . '">' 
                            . e(ucfirst($row->access_level)) . '</span>';
                    
                    return $badges;
                })
                ->html(),

            Column::make("Acciones", "id")
                ->label(function($row) {
                    return view('admin.videos.actions', ['video' => $row]);
                })
                ->html(),
        ];
    }

    public function builder(): Builder
    {
        return Video::query()
            ->with(['catsvideo']) // Carga las relaciones necesarias
            ->select([
                'videos.id',
                'videos.title',
                'videos.slug',
                'videos.year',
                'videos.thumbnail_url',
                'videos.views',
                'videos.duration',
                'videos.is_trending',
                'videos.is_featured',
                'videos.access_level',
                'videos.created_at',
                'videos.updated_at',
            ]);
    }
}
