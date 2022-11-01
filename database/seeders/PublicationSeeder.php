<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Publication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publication::query()
                ->delete();
        Publication::factory()
                ->count(2)
                ->create();
    }
}
