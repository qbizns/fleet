<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RidesSeeder extends Seeder{
    public function run()
    {
        DB::table('rides')->delete();
        $rides = array(
            [
                'departure_place' => 1, 
                'arrival_place' => 2, 
                'order' => 1, 
                'bus' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'departure_place' => 2, 
                'arrival_place' => 3, 
                'order' => 1, 
                'bus' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'departure_place' => 3, 
                'arrival_place' => 4, 
                'order' => 2, 
                'bus' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'departure_place' => 4, 
                'arrival_place' => 5, 
                'order' => 3, 
                'bus' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
        DB::table('rides')->insert($rides);
    }
}