<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'alex muhammad',
            'email' => 'alex@mail.com',
            'password' => '12345'
        ]);

        Unit::create([
            'kode' => 'kg',
            'nama' => 'Kilogram'
        ]);
        Unit::create([
            'kode' => 'm',
            'nama' => 'Meter'
        ]);
        Unit::create([
            'kode' => 'lt',
            'nama' => 'Liter'
        ]);

        Category::create([
            'kode' => 'kts',
            'nama' => 'Kitchen set'
        ]);
        Category::create([
            'kode' => 'bds',
            'nama' => 'Bedroom set'
        ]);
        Category::create([
            'kode' => 'fms',
            'nama' => 'Family roo set'
        ]);
    }
}
