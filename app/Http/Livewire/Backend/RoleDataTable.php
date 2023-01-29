<?php

namespace App\Http\Livewire\Backend;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Role;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class RoleDataTable extends DataTableComponent
{
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setBulkActions([
            'exportSelected' => 'Export',
            'deleteSelected' => 'Delete',
        ]);
        $this->setHideBulkActionsWhenEmptyStatus(true);
    }

    public function exportSelected()
    {
        dd($this->getSelected());
//        $this->clearSelected();
    }

    public function deleteSelected()
    {
        dd($this->getSelected());
//        $this->clearSelected();
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Deletable')
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('deletable', true);
                    } elseif ($value === '0') {
                        $builder->where('deletable', false);
                    }
                }),
        ];
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
