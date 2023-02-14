<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreMailSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return view('settings.mail.index');
    }

    public function store(StoreMailSettingRequest $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key], ['value' => $value]
            );
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}
