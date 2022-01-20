<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\BoardingHouse;

class BoardingHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
              'bhouse_name' => 'DACLES BOARDING HOUSE',
              'user_id' => 2,
              'owner' => 'DACLES',
              'long' => '8.061954385341004',
              'lat' => '123.75697910785675',
              'is_approve' => 0
            ],
            [
                'bhouse_name' => 'FUENTES BOARDING HOUSE',
                'user_id' => 2,
                'owner' => 'FUENTES',
                'long' => '8.063680587142077',
                'lat' => '123.75273048877715',
                'is_approve' => 0
            ],
            [
                'bhouse_name' => 'SIETE BOARDING HOUSE',
                'user_id' => 2,
                'owner' => 'SIETE',
                'long' => '8.061486981739758',
                'lat' => '123.75372290611267',
                'is_approve' => 0
            ],
            [
                'bhouse_name' => 'TAGOBAR BOARDING HOUSE',
                'user_id' => 2,
                'owner' => 'SIETE',
                'long' => '8.063834617098614',
                'lat' => '123.75342249870299',
                'is_approve' => 0
            ],
        ];

        BoardingHouse::insertOrIgnore($data);

    }
}
