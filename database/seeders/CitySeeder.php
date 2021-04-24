<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder{
    public function run(){
        DB::table('cities')->delete();
        $cities = array(
            [
                'title' => 'Cairo',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Giza',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'AlFayyum',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'AlMinya',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Asyut',
                'created_at' => date('Y-m-d H:i:s')
            ],
        );
        DB::table('cities')->insert($cities);
    }
}