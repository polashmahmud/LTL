<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function index()
    {
        return view('settings.google.index');
    }

    public function store()
    {
        //
    }
}
