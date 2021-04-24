<?php
namespace Database\Seeders;

use App\Model\Seat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatSeeder extends Seeder
{
    public function run(){
        DB::table('seats')->delete();
        $currentDate = date('Y-m-d H:i:s');
        $seats = array(
            ['seet_id' => 'Seat #1', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #2', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #3', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #4', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #5', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #6', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #7', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #8', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #9', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #10', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #11', 'bus' => 1, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #12', 'bus' => 1, 'created_at' => $currentDate],

            ['seet_id' => 'Seat #1', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #2', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #3', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #4', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #5', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #6', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #7', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #8', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #9', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #10', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #11', 'bus' => 2, 'created_at' => $currentDate],
            ['seet_id' => 'Seat #12', 'bus' => 2, 'created_at' => $currentDate],
        );
        DB::table('seats')->insert($seats);
    }
}