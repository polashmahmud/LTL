<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'dashboard',
        ]);

        // User
        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Access User',
            'slug' => 'users.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Create User',
            'slug' => 'users.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Edit User',
            'slug' => 'users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Delete User',
            'slug' => 'users.destroy',
        ]);

        // Settings -> Role
        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access Role',
            'slug' => 'settings.roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'settings.roles.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'settings.roles.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'settings.roles.destroy',
        ]);

        // Settings -> Backup
        $moduleBackup = Module::updateOrCreate(['name' => 'Backup Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Access Backup',
            'slug' => 'settings.backups.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Create Backup',
            'slug' => 'settings.backups.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Edit Backup',
            'slug' => 'settings.backups.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Delete Backup',
            'slug' => 'settings.backups.destroy',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Download Backup',
            'slug' => 'settings.backups.download',
        ]);

        // Menu
        $moduleAppMenu = Module::updateOrCreate(['name' => 'Menu Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Access Menu',
            'slug' => 'settings.menus.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Create Menu',
            'slug' => 'settings.menus.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Edit Menu',
            'slug' => 'settings.menus.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Delete Menu',
            'slug' => 'settings.menus.destroy',
        ]);

        // Menu items
        $moduleAppMenu = Module::updateOrCreate(['name' => 'Menu builder Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Access Menu builder',
            'slug' => 'settings.menus.builder.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Create Menu builder',
            'slug' => 'settings.menus.builder.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Edit Menu builder',
            'slug' => 'settings.menus.builder.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Delete Menu builder',
            'slug' => 'settings.menus.builder.destroy',
        ]);
    }
}
