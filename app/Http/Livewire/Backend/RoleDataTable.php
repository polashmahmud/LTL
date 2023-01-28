<?php

namespace App\Http\Livewire\Backend;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Role;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class RoleDataTable extends DataTableComponent
{
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Slug", "slug")
                ->searchable()
                ->sortable(),
            Column::make("Deletable")
                ->sortable()
                ->format(fn($value, $row, Column $column) => $row->deletable ? '<span class="badge bg-blue-lt">Yes</span>' : '<span class="badge bg-red-lt">No</span>')
            ->html(),
            Column::make('Action')
                ->label(function ($row, Column $column) {
                    return view('backend.components.roles.action', ['row' => $row]);
                })
        ];
    }
}
