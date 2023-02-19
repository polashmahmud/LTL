<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CrudGeneratorController extends Controller
{
    public function index()
    {
        return view('settings.crud.index');
    }
}
