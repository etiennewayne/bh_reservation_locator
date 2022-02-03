<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'username' => 'angel',
                'qr_ref' => 'XYZA24',
                'lname' => 'LOPEZ',
                'fname' => 'ANGEL',
                'mname' => 'P',
                'sex' => 'FEMALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'angel@dev.com',
                'contact_no' => '09167789581',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09167789581',
                'guardian_address' => 'POB. BONIFACIO',
                'business_permit_img' => '',
                'role' => 'BOARDER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'dacles',
                'qr_ref' => 'GGH334',
                'lname' => 'DACLES',
                'fname' => 'RICHE',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'dacles@dev.com',
                'contact_no' => '09167789582',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09167789581',
                'guardian_address' => 'POB. BONIFACIO',
                'business_permit_img' => 'X58cNXkY5OWADcJVy3wO1jCAKKGAqC9NkoQ5yr5x.png',
                'role' => 'LANDOWNER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'fuentes',
                'qr_ref' => 'GJAS45',
                'lname' => 'FUENTES',
                'fname' => 'JOHN',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'fuentes@dev.com',
                'contact_no' => '09051234598',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09167789581',
                'guardian_address' => 'POB. BONIFACIO',
                'business_permit_img' => '',
                'role' => 'LANDOWNER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'siete',
                'qr_ref' => 'PPO9312',
                'lname' => 'SIETE',
                'fname' => 'PARLING',
                'mname' => '',
                'sex' => 'FEMALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'siete@dev.com',
                'contact_no' => '09051234598',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09165873641',
                'guardian_address' => 'POB. BONIFACIO',
                'business_permit_img' => '',
                'role' => 'LANDOWNER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'tagobar',
                'qr_ref' => '123JHDT',
                'lname' => 'TAGOBAR',
                'fname' => 'MICHAEL',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'tagobar@dev.com',
                'contact_no' => '09051234598',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09165873641',
                'guardian_address' => 'POB. BONIFACIO',
                'business_permit_img' => '',
                'role' => 'LANDOWNER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'jerecho',
                'qr_ref' => 'HUYD684',
                'lname' => 'MELLEJOR',
                'fname' => 'JERECHO',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'jerecho@dev.com',
                'contact_no' => '09167789583',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09167789581',
                'guardian_address' => 'POB. BONIFACIO',
                'business_permit_img' => '',
                'role' => 'BOARDER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'admin',
                'qr_ref' => 'ADMIN112',
                'lname' => 'ALGADIPE',
                'fname' => 'HESSEL',
                'mname' => '',
                'sex' => 'FEMALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'admin@dev.com',
                'contact_no' => '09167789584',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09167789581',
                'guardian_address' => 'POB. BONIFACIO',
                'business_permit_img' => '',
                'role' => 'ADMINISTRATOR',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'kimchie',
                'qr_ref' => 'JUG66878',
                'lname' => 'HIBAYA',
                'fname' => 'NIMCHIE',
                'mname' => '',
                'sex' => 'FEMALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'kimchie@dev.com',
                'contact_no' => '09267789584',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09167789581',
                'guardian_address' => 'POB. BONIFACIO',
                'business_permit_img' => '',
                'role' => 'BOARDER',
                'password' => Hash::make('a')
            ]
        ];

        \App\Models\User::insertOrIgnore($data);
    }
}
