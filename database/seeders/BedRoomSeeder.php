<?php

namespace Database\Seeders;

use App\Models\BedRoom;
use Illuminate\Database\Seeder;

class BedRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'bhouse_id' => 1,
                'bedroom_name' => 'BEDROOM 1',
                'bedroom_desc' => 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed',
                'bedroom_img_path' => '',
                'price' => 300,
                'is_booked' => 0
            ],
            [
                'bhouse_id' => 1,
                'bedroom_name' => 'BEDROOM 2',
                'bedroom_desc' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from',
                'bedroom_img_path' => '',
                'price' => 450,
                'is_booked' => 0
            ],
            [
                'bhouse_id' => 2,
                'bedroom_name' => 'BEDROOM B1',
                'bedroom_desc' => 'to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',
                'bedroom_img_path' => '',
                'price' => 450,
                'is_booked' => 0
            ],
            [
                'bhouse_id' => 2,
                'bedroom_name' => 'BEDROOM B2',
                'bedroom_desc' => 'ou are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks',
                'bedroom_img_path' => '',
                'price' => 450,
                'is_booked' => 0
            ],

        ];

        BedRoom::insertOrIgnore($data);
    }
}
