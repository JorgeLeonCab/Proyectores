<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 3,
            'name' => 'Admin',
        ]);
        Role::create([
            'id' => 2,
            'name' => 'Profesor',
        ]);
        Role::create([
            'id' => 666,
            'name' => 'Super-usuario',
        ]);
    }
}