<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    DB::table('group_types')->insert(array (
        0 => 
          array (
            'name' => 'Przychody',
            'created_at' => date("Y-m-d H:i:s")
         ),
        1 => 
          array (
            'name' => 'Koszty',
            'created_at' => date("Y-m-d H:i:s")
         ),
     ));

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
