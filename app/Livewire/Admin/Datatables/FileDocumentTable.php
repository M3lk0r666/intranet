<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use App\Models\FileDocument;
use Illuminate\Database\Eloquent\Builder;

class FileDocumentTable extends DataTableComponent
{
    protected $model = FileDocument::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('created_at', 'desc')
            ->setTableWrapperAttributes([
                'class' => 'relative overflow-x-auto shadow-md sm:rounded-lg',
            ])
            ->setTableAttributes([
                'class' => 'w-full text-sm text-left text-gray-500 dark:text-gray-400',
            ])
            ->setTheadAttributes([
                'class' => 'text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400',
            ])
            ->setSearchStatus(true)
            ->setSearchVisibilityEnabled()
            ->setSearchPlaceholder('Buscar documentos...')
            ->setPerPageVisibilityEnabled()
            ->setPerPage(10);
    }

    public function filters(): array
    {
        $categories = FileDocument::getCategories();
        $categoryOptions = ['' => 'Todas las categorías'];
        
        foreach ($categories as $key => $category) {
            $categoryOptions[$key] = $category['name'];
        }
        
        return [
            SelectFilter::make('Categoría', 'category')
                ->options($categoryOptions)
                ->filter(function(Builder $builder, string $value) {
                    if ($value) {
                        $builder->where('category', $value);
                    }
                }),
            
            SelectFilter::make('Tipo', 'extension')
                ->options([
                    '' => 'Todos los tipos',
                    'pdf' => 'PDF',
                    'doc' => 'Word doc',
                    'docx' => 'Word docx',
                    'xls' => 'Excel',
                    'xlsx' => 'Excel',
                    'ppt' => 'PowerPoint',
                    'pptx' => 'PowerPoint',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value) {
                        $builder->where('extension', $value);
                    }
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->hideIf(true),
            Column::make('Titulo', 'title')
            ->sortable()
            ->searchable(),
            Column::make('Descripcion', 'description')
            ->sortable()
            ->searchable(),

            Column::make("Categoría", "category")
                ->searchable()
                ->sortable()
                ->format(function($value, $row, $column) {
                    $category = $row->category_info;
                    
                    return view('admin.documents.category', [
                        'category' => $category,
                        'value' => $value,
                    ]);
                })
                ->html(),

            Column::make("Tipo", "extension")
                ->searchable()
                ->sortable()
                ->format(function($value, $row, $column) {
                    $badgeClasses = [
                        'pdf' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                        'doc' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                        'docx' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                        'xls' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                        'xlsx' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                        'ppt' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                        'pptx' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                    ];
                    
                    $colorClass = $badgeClasses[$value] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                    
                    return <<<HTML
                    <span class="text-xs font-medium px-2.5 py-0.5 rounded {$colorClass}">
                        .{$value}
                    </span>
                    HTML;
                })
                ->html(),

            Column::make("Tamaño", "size")
                ->sortable()
                ->format(function($value, $row, $column) {
                    return <<<HTML
                    <span class="font-medium text-gray-700 dark:text-gray-300">
                        {$row->formatted_size}
                    </span>
                    HTML;
                })
                ->html(),

            Column::make("Descargas", "downloads")
                ->sortable()
                ->format(function($value, $row, $column) {
                    return <<<HTML
                    <div class="flex items-center">
                        <i class="las la-download text-blue-500"></i>
                        <span class="font-semibold">{$value}</span>
                    </div>
                    HTML;
                })
                ->html(),

                Column::make("Subido Por", "user_id")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, $column) {
                    return $row->user->name ?? '<span class="text-gray-500">Sistema</span>';
                })
                ->html(),

            Column::make("Fecha", "created_at")
                ->sortable()
                ->format(function($value, $row, $column) {
                    return $value->format('d/m/Y');
                }),

            Column::make("Acciones")
                ->label(function($row){
                    return view('admin.documents.actions', [
                        'document' => $row
                    ]);
                }),
        ];
    }
}