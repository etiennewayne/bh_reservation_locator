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
                'role' => 'BOARDER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'owner',
                'lname' => 'MAGLANGIT',
                'fname' => 'RICHE',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'riche@dev.com',
                'contact_no' => '09167789582',
                'guardian_name' => 'JUAN DELA CRUZ',
                'guardian_contact_no' => '09167789581',
                'guardian_address' => 'POB. BONIFACIO',
                'role' => 'owner',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'jerecho',
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
                'role' => 'BOARDER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'admin',
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
                'role' => 'ADMINISTRATOR',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'kimchie',
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
                'role' => 'BOARDER',
                'password' => Hash::make('a')
            ]
        ];

        \App\Models\User::insertOrIgnore($data);
    }
}
