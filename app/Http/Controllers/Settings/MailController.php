<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return view('settings.mail.index');
    }

    public function store()
    {

    }
}
