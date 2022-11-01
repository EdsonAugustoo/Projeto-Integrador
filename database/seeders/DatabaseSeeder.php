<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Experience;
use App\Models\Publication;
use App\Models\ServiceUser;
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
        $this->call([
            UserSeeder::class,
            ExperienceSeeder::class,
            ServiceSeeder::class,
            ServiceUserSeeder::class,
            PublicationSeeder::class
        ]);
    }
}
