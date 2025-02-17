<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ezequiel López Cruz',
            'email' => 'ezequiel@gmail.com',
            'password' => bcrypt('12345678'),            
        ])->assignRole('GoldenAdmin');

        User::factory(9)->create();
    }
}
