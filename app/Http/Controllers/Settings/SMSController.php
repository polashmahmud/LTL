<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function index()
    {
        return view('settings.sms.index');
    }

    public function store()
    {

    }
}
