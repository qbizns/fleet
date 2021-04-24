<?php
namespace Database\Seeders;

use App\Model\Bus;
use App\Model\Seat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    public function run(){
        DB::table('buses')->delete();
        $buses = array(
            [
                'title' => '2158 ق م ن',
                'places_available' => 12,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => '3985 س ط ص',
                'places_available' => 12,
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
        DB::table('buses')->insert($buses);
    }
}