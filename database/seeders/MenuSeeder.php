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
            'name'        => 'backend',
            'description' => 'Backend Menu',
            'deletable'   => false,
        ]);

        $menu->items()->create([
            'type'       => 'item',
            'parent_id'  => null,
            'order'      => 1,
            'title'      => 'Dashboard',
            'url'        => '/dashboard',
            'target'     => '_self',
            'icon_class' => 'layout-dashboard',
        ]);

        $menu->items()->create([
            'type'       => 'divider',
            'parent_id'  => null,
            'order'      => 2,
            'title'      => 'Pages',
            'url'        => null,
            'target'     => '_self',
            'icon_class' => null,
        ]);

        $menu->items()->create([
            'type'       => 'item',
            'parent_id'  => null,
            'order'      => 3,
            'title'      => 'Users',
            'url'        => null,
            'target'     => '_self',
            'icon_class' => 'users',
        ]);

        $menu->items()->create([
            'type'       => 'item',
            'parent_id'  => 3,
            'order'      => 4,
            'title'      => 'All Users',
            'url'        => '/users',
            'target'     => '_self',
            'icon_class' => null,
        ]);

        $menu->items()->create([
            'type'       => 'item',
            'parent_id'  => 3,
            'order'      => 5,
            'title'      => 'Create User',
            'url'        => '/users/create',
            'target'     => '_self',
            'icon_class' => null,
        ]);

        $menu->items()->create([
            'type'       => 'divider',
            'parent_id'  => null,
            'order'      => 6,
            'title'      => 'Settings',
            'url'        => null,
            'target'     => '_self',
            'icon_class' => null,
        ]);

        $menu->items()->create([
            'type'       => 'item',
            'parent_id'  => null,
            'order'      => 7,
            'title'      => 'Settings',
            'url'        => null,
            'target'     => '_self',
            'icon_class' => 'tool',
        ]);

        $menu->items()->create([
            'type'       => 'item',
            'parent_id'  => 7,
            'order'      => 8,
            'title'      => 'General Settings',
            'url'        => '/settings/general',
            'target'     => '_self',
            'icon_class' => null,
        ]);

        $menu->items()->create([
            'type'       => 'item',
            'parent_id'  => 7,
            'order'      => 8,
            'title'      => 'Menus',
            'url'        => '/menus',
            'target'     => '_self',
            'icon_class' => null,
        ]);

        $menu->items()->create([
            'type'       => 'item',
            'parent_id'  => 7,
            'order'      => 8,
            'title'      => 'Roles',
            'url'        => '/roles',
            'target'     => '_self',
            'icon_class' => null,
        ]);
    }
}
