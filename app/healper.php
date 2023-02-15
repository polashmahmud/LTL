<?php

use App\Models\Menu;
use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($name, $default = null)
    {
        return Setting::getByKey($name, $default);
    }
}

// active menu
if (!function_exists('active_menu')) {
    function activeMenu($uri = '')
    {
        $url = ltrim($uri, '/');
        return (\request()->is($url) ? 'active' : '' || \request()->is($url . '/*')) ? 'active' : '';
    }
}

if (!function_exists('active_parent_menu')) {
    function activeParentMenu($parent): string
    {
        $menus = $parent->children->pluck('url')->toArray();

        foreach ($menus as $menu) {
            if (\request()->is(ltrim($menu, '/'))) {
                return 'active';
            }
        }

        return '';
    }
}

if (!function_exists('menu')) {
    function menu($name)
    {
        $menu = Menu::where('name', $name)->first();

        return $menu->items()->with('children')->get();
    }
}
