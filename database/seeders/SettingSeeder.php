<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key'   => 'app_name',
                'value' => 'LTL Admin Panel',
            ],
            [
                'key'   => 'app_description',
                'value' => 'LTL is a Laravel boilerplate with all the basic features required to start a new project.',
            ],
            [
                'key'   => 'app_use_logo_or_name',
                'value' => 'logo',
            ],
            [
                'key'   => 'layout',
                'value' => 'default',
            ]
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']], ['value' => $setting['value']]
            );
        }
    }
}
