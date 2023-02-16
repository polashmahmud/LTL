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
            if ($request->hasFile($key)) {
                $image = $request->file($key);
                $imageName = $image->getClientOriginalName();
                $imageNewName = explode('.', $imageName)[0];
                $fileExtension = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
                if (!file_exists(storage_path('app/public/settings'))) {
                    mkdir(storage_path('app/public/settings'), 0777, true);
                }
                $image->move(storage_path('app/public/settings'), $fileExtension);
                $value = env('APP_URL') . '/storage/settings/' . $fileExtension;
            }

            Setting::updateOrCreate(
                ['key' => $key], ['value' => $value]
            );

            if ($key == 'app_name' && $value != env('APP_NAME')) {
                $app_name = "'" . $value . "'";
                $envFile = app()->environmentFilePath();
                $str = file_get_contents($envFile);
                $str = preg_replace("/APP_NAME=(.*)/", "APP_NAME=" . $app_name, $str);
                $fp = fopen($envFile, "w");
                fwrite($fp, $str);
                fclose($fp);
            }
        }



        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
