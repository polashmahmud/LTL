<?php

namespace App\Http\Livewire\Settings\Crud;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class CrudForm extends Component
{
    public $model;
    public $controller;
    public $folder;
    public $fields = [
        [
            'name'       => '',
            'type'       => '',
            'length'     => '',
            'not_null'   => false,
            'default'    => '',
            'comment'    => '',
            'input_type' => '',
        ]
    ];

    protected $rules = [
        'model'               => 'required|string|max:255',
        'folder'              => 'required|string|max:255',
        'controller'          => 'required|string|max:255',
//        'fields'              => 'required|array|min:1',
//        'fields.*.name'       => 'required|string|max:255',
//        'fields.*.type'       => 'required|string|max:255',
//        'fields.*.length'     => 'required|string|max:255',
//        'fields.*.not_null'   => 'required|boolean',
//        'fields.*.default'    => 'nullable|string|max:255',
//        'fields.*.comment'    => 'nullable|string|max:255',
//        'fields.*.input_type' => 'required|string|max:255',
    ];

    protected $messages = [
        'model.required'               => 'Model name is required',
        'folder.required'              => 'Folder name is required',
        'fields.*.name.required'       => 'Field name is required',
        'fields.*.type.required'       => 'Field type is required',
        'fields.*.length.required'     => 'Field length is required',
        'fields.*.not_null.required'   => 'Field not null is required',
        'fields.*.input_type.required' => 'Field input type is required',
    ];

    public function addColumn()
    {
        $this->fields[] = [
            'name'       => '',
            'type'       => '',
            'length'     => '',
            'not_null'   => false,
            'default'    => '',
            'comment'    => '',
            'input_type' => '',
        ];
    }

    public function removeColumn($index)
    {
        if (count($this->fields) > 1) {
            unset($this->fields[$index]);
            $this->fields = array_values($this->fields);
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        // check model is exists or not
        if (class_exists('App\\Models\\' . $this->model)) {
            $this->addError('model', 'Model already exists');
            return;
        }

        // check views folder is exists or not
        if (is_dir(resource_path('views/' . $this->folder))) {
            $this->addError('folder', 'Folder already exists');
            return;
        }

        // check controller is exists or not
        if (class_exists('App\\Http\\Controllers\\' . $this->controller)) {
            $this->addError('controller', 'Controller already exists');
            return;
        }

        // create model, controller, views, migration

//        Artisan::call('make:model ' . $this->model . ' -m');

//        Artisan::call('make:controller ' . $this->controller . ' --resource');

        // make a folder in views
        mkdir(resource_path('views/' . $this->folder));

        dd($validatedData);
    }

    public function render()
    {
        return view('livewire.settings.crud.crud-form');
    }
}
