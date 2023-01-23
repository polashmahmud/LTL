<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('password'),
            'role_id'  => Role::where('slug', 'admin')->first()->id,
        ]);

        User::updateOrCreate([
            'name'     => 'User',
            'email'    => 'user@example.com',
            'password' => bcrypt('password'),
            'role_id'  => Role::where('slug', 'user')->first()->id,
        ]);
    }
}
