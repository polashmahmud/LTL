<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Request;

if (!function_exists('setting')) {

        /**
        * description
        *
        * @param
        * @return
        */
        function setting($name, $default = null)
        {
            return Setting::getByKey($name, $default);
        }
}

// active menu
if (!function_exists('active_menu')) {

        /**
        * description
        *
        * @param
        * @return
        */
        function activeMenu($uri = '')
        {
            $active = '';
            if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
                $active = 'active';
            }
            return $active;
        }
}
