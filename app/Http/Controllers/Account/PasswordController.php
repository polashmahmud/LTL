<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StorePasswordRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()
    {
        return view('account.password.index');
    }

    public function store(StorePasswordRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('account.password.index')->with('success', 'Password updated.');
    }
}
