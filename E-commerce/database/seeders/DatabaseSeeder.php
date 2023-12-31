<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
         \App\Models\Category::factory(6)->create();
         \App\Models\Product::factory(60)->create();

         \App\Models\User::create([
            'name' => 'omari',
            'mobile' => '1234567890',
            'address' => '123 Main St',
            'email' => 'omari@gmail.com',
            'password' => bcrypt('om@12344'), // تحويل الباسورد إلى تشفير
            'utype' => 'ADM',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
