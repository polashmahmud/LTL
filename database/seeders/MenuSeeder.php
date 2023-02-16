<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'name'        => 'main',
            'description' => 'Main Menu',
            'deletable'   => false,
        ]);

        $menu->items()->create([
            'parent_id'  => null,
            'order'      => 1,
            'title'      => 'Dashboard',
            'url'        => '/dashboard',
            'target'     => '_self',
            'icon_class' => 'layout-dashboard',
        ]);

        $menu->items()->create([
            'parent_id'  => null,
            'order'      => 2,
            'title'      => 'Users',
            'url'        => null,
            'target'     => '_self',
            'icon_class' => 'users',
        ]);

        $menu->items()->create([
            'parent_id'  => 2,
            'order'      => 3,
            'title'      => 'All Users',
            'url'        => '/users',
            'target'     => '_self',
            'icon_class' => null,
        ]);

        $menu->items()->create([
            'parent_id'  => 2,
            'order'      => 4,
            'title'      => 'Create User',
            'url'        => '/users/create',
            'target'     => '_self',
            'icon_class' => null,
        ]);

        $menu->items()->create([
            'parent_id'  => null,
            'order'      => 5,
            'title'      => 'Settings',
            'url'        => '/settings',
            'target'     => '_self',
            'icon_class' => 'tool',
        ]);
    }
}
