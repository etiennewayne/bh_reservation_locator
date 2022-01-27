<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
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
                'bhouse_id' => 1,
                'room_no' => 'ROOM 101',
                'room_desc' => 'to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',
                'room_img_path' => '',
            ],
            [
                'bhouse_id' => 1,
                'room_no' => 'ROOM 102',
                'room_desc' => 'ou are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks',
                'room_img_path' => '',
            ],

        ];

        Room::insertOrIgnore($data);

    }
}
