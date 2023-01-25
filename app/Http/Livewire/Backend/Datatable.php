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
    public $selectPage = false;
    public $selectAll = false;
    public $query;

    /**
     * @param $model
     * @return void
     */
    public function mount($model, $exclude = '', $paginate = 15)
    {
        $this->model = 'App\\Models\\' . $model;
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
        return new $this->model;
    }

    protected function checkRecords()
    {
        return $this->builder()->whereIn('id', $this->checked);
    }

    public function isChecked($record)
    {
        return in_array($record->id, $this->checked);
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->recores()->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function selectAll()
    {
        $this->selectAll = true;
        $this->checked = $this->builder()->get()->pluck('id')->map(fn ($id) => (string) $id)->toArray();
    }

    public function clearAll()
    {
        $this->checked = [];
        $this->selectPage = false;
        $this->selectAll = false;
    }

    public function deleteChecked()
    {
        $this->checkRecords()->delete();
        $this->checked = [];
    }

    public function updatingQuery(): void
    {
        $this->gotoPage(1);
    }

    public function recores()
    {
        $builder = $this->builder();
        if ($this->query) {
            $builder = $builder->search($this->query);
        }

        return $builder->paginate($this->paginate);
    }

    public function render()
    {
        return view('livewire.backend.datatable');
    }
}
