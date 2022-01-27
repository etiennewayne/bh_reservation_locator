<?php

namespace Database\Seeders;

use App\Models\BedSpace;
use Illuminate\Database\Seeder;

class BedSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // [
            //     'bhouse_id' => 1,
            //     'bedspace_name' => 'BEDROOM 1',
            //     'bedspace_desc' => 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed',
            //     'bedspace_img_path' => '',
            //     'price' => 300,
            //     'is_booked' => 0
            // ],
            // [
            //     'bhouse_id' => 1,
            //     'bedspace_name' => 'BEDROOM 2',
            //     'bedspace_desc' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from',
            //     'bedspace_img_path' => '',
            //     'price' => 450,
            //     'is_booked' => 0
            // ],
            [
                'room_id' => 1,
                'bedspace_name' => 'BED SPACE B1',
                'bedspace_desc' => 'to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',
                'bedspace_img_path' => '',
                'price' => 450,
                'is_booked' => 0
            ],
            [
                'room_id' => 1,
                'bedspace_name' => 'BED SPACE B2',
                'bedspace_desc' => 'ou are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks',
                'bedspace_img_path' => '',
                'price' => 450,
                'is_booked' => 0
            ],

        ];

        BedSpace::insertOrIgnore($data);
    }
}
