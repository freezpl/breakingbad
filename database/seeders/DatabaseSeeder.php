<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Episode;
use App\Models\Quote;
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
        // \App\Models\User::factory(10)->create();       
        
        
        Episode::factory(30)->create();
        Character::factory(100)->create();
        Quote::factory(500)->create();

        // Populate episodes with characsters
        $episodes = Episode::all();
        Character::all()->each(function ($character) use ($episodes) {
            $character->episodes()->attach(
                $episodes->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
