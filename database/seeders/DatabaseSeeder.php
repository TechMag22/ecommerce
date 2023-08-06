<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // DB::table('users')->insert([
        //     [
        //         // 'id' => 3,
        //         'name' => 'admin',
        //         'email' => 'admin@admin.com',
        //         'password' => Hash::make('password'),
        //         'is_admin' => true,
        //     ]
        // ]);

        User::create([
            // 'id' => 3,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,
        ]);
        DB::table('categories')->insert([
            [
                'name' => 'Phones',
                'description' => 'Phones',
                'created_at' => now(),
                'updated_at' => now()
            ], 
            [
                'name' => 'Laptops',
                'description' => 'Laptops',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tablets',
                'description' => 'Tablets',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Furnitures',
                'description' => 'Furnitures',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Electronics',
                'description' => 'Electronics',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
