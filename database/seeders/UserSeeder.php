<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Rick Holtman',
            'email' => 'rick.holtman@groax.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

         User::factory(10)->create();
    }
}
