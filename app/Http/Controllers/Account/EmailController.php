<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreEmailRequest;
use App\Mail\Account\EmailUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        return view('account.email.index');
    }

    public function store(StoreEmailRequest $request)
    {
        $request->user()->update([
            'email' => $request->email,
        ]);

        Mail::to($request->current_email)->send(new EmailUpdated());

        return redirect()->route('account.email.index')->with('success', 'Email updated successfully.');
    }
}
