<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Jorge León Caballero',
            'email' => 'leon@ipn.mx',
            'password' => bcrypt('987654321'),
            'username' => 'ABC123'
        ])->assignRole('Super-usuario');
    }
}
