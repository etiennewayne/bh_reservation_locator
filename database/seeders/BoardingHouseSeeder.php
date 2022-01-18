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
              'owner' => 'DACLES',
              'business_permit' => '000-1111',
              'bhouse_img_path' => '',
              'long' => '8.061954385341004',
              'lat' => '123.75697910785675'
            ],
            [
                'bhouse_name' => 'FUENTES BOARDING HOUSE',
                'owner' => 'FUENTES',
                'business_permit' => '000-1112',
                'bhouse_img_path' => '',
                'long' => '8.063680587142077',
                'lat' => '123.75273048877715'
            ],
            [
                'bhouse_name' => 'SIETE BOARDING HOUSE',
                'owner' => 'SIETE',
                'business_permit' => '000-1113',
                'bhouse_img_path' => '',
                'long' => '8.061486981739758',
                'lat' => '123.75372290611267'
            ],
            [
                'bhouse_name' => 'TAGOBAR BOARDING HOUSE',
                'owner' => 'SIETE',
                'business_permit' => '000-1114',
                'bhouse_img_path' => '',
                'long' => '8.063834617098614',
                'lat' => '123.75342249870299'
            ],
        ];

        BoardingHouse::insertOrIgnore($data);

    }
}
