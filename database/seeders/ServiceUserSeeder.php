<?php

namespace Database\Seeders;

use App\Models\ServiceUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceUser::query()->delete();
        DB::table('service_user')->insert(

        [
            'user_id'       => 1,
            'service_id'    =>1

        ],
        [

            'user_id'       => 1,
            'service_id'    =>2
        ]);
    }
}
