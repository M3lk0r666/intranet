<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Client;

class ClientTable extends DataTableComponent
{
    protected $model = Client::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Cliente", "name")
                ->sortable(),
                Column::make("Fecha Creación", "created_at")
                ->sortable()
                ->format(function($value){
                    return $value->format('d/m/Y');
                    }),
                Column::make('Acciones')
                ->label(function($row){
                    return view('admin.clients.actions', [
                        'client' => $row
                    ]);
                })
        ];
    }
}