<?php

namespace App\Http\Livewire\Backend;

use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $model;
    public $columns;
    public $exclude;
    public $paginate;
    public $checked = [];

    /**
     * @param $model
     * @return void
     */
    public function mount($model, $exclude = '', $paginate = 15)
    {
        $this->model = $model;
        $this->exclude = explode(',', $exclude);
        $this->paginate = $paginate;
        $this->columns = $this->columns();
    }

    public function columns()
    {
        return collect(Schema::getColumnListing($this->builder()->getQuery()->from))
            ->reject(function ($column) {
                return in_array($column, $this->exclude);
            })->toArray();
    }

    public function builder()
    {
        return $this->model::query();
    }

    protected function checkRecords()
    {
        return $this->builder()->whereIn('id', $this->checked);
    }

    public function isChecked($record)
    {
        return in_array($record->id, $this->checked);
    }

    public function deleteChecked()
    {
        $this->checkRecords()->delete();
        $this->checked = [];
    }

    public function recores()
    {
        return $this->builder()->paginate($this->paginate);
    }

    public function render()
    {
        return view('livewire.backend.datatable');
    }
}
