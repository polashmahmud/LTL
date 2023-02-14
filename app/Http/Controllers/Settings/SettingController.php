<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function store(StoreSettingRequest $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key], ['value' => $value]
            );

            if ($key == 'app_name') {
                $envFile = app()->environmentFilePath();
                $str = file_get_contents($envFile);
                $str = preg_replace("/APP_NAME=(.*)/", "APP_NAME=" . $value, $str);
                $fp = fopen($envFile, "w");
                fwrite($fp, $str);
                fclose($fp);
            }
        }



        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
