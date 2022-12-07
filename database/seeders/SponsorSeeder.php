<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsor::factory()
        ->times(3)
        ->create();
            //this gets the sponsors and assigns them to a team
            foreach(Team::all() as $team) 
            {
                $sponsors = Sponsor::inRandomOrder()->take(rand(1,3))->pluck('id');
                $team->sponsors()->attach($sponsors);
            }
    }
}
