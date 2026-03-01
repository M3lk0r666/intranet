<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Post;

class PostTable extends DataTableComponent
{
    protected $model = Post::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
       
    }

    

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make("Titulo Post", "title")
                ->sortable()
                ->searchable(),
            Column::make("Ha sido Publicado", "is_published")
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => '<label class="bg-' . ($value == 1 ? 'green' : 'red') . '-100 hover:bg-' . ($value == 1 ? 'green' : 'red') . '-200 border border-' . ($value == 1 ? 'green' : 'red') . '-200 text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded ' .
                                ($value == 1 ? 'text-green-800' : 'text-red-800') . '">' . ($value == 1 ? 'Publicado' : 'No publicado') . '</label>'
                )
                ->html(),
            Column::make("Fecha Creacion", "created_at")
            ->sortable()
            ->format(function($value){
                return $value->format('d/m/Y');
            }),
            Column::make('Acciones')
            ->label(function($row){
                return view('admin.posts.actions', [
                    'post' => $row
                ]);
            })
        ];
    }
}
