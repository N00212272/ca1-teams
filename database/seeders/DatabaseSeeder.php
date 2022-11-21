<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(TeamSeeder::class);
        $this->call(RoleSeeder::class);
         $this->call(UserSeeder::class);
         //allows the hasTeams() function to run which seeds teams table
         $this->call(OwnerSeeder::class);
    
    }
}
