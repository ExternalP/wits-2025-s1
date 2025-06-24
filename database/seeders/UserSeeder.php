<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                'id'=>100,
                'given_name'=>'Ad',
                'family_name'=>'Ministrator',
                'preferred_name'=>'Ad',
                'preferred_pronouns' => 'he/him',
                'email'=>'admin@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => 'images/default-profile.png',
                'email_verified_at'=>now(),


            ],

            [
                'id'=>200,
                'given_name'=>'Adrian',
                'family_name'=>'Gould',
                'preferred_name'=>'Ad',
                'preferred_pronouns' => 'he/him',
                'email'=>'adrain@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => 'images/default-profile.png',
                'email_verified_at'=>now(),

            ],

            [
                'id'=>202,
                'given_name'=>'Chloe',
                'family_name'=>'Gu',
                'preferred_name'=>'Chloe',
                'preferred_pronouns' => 'she/her',
                'email'=>'chloe@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => 'images/default-profile.png',
                'email_verified_at'=>now(),


            ],

            [
                'id'=>1000,
                'given_name'=>"Jacques",
                'family_name'=>"d'Carre",
                'preferred_name'=>'Jacques',
                'preferred_pronouns' => 'he/him',
                'email'=>'jacques@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => 'images/default-profile.png',
                'email_verified_at'=>now(),
            ],

            [
                'id'=>1001,
                'given_name'=>"Eileen",
                'family_name'=>"Dover",
                'preferred_name'=>'Eileen',
                'preferred_pronouns' => 'he/him',
                'email'=>'eileen@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => 'images/default-profile.png',
                'email_verified_at'=>now(),
            ],

            [
                'id'=>1002,
                'given_name'=>'Robyn',
                'family_name'=>'Banks',
                'preferred_name'=>'Robyn',
                'preferred_pronouns' => 'he/him',
                'email'=>'robyn@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => 'images/default-profile.png',
                'email_verified_at'=>now(),
            ],
        ];

        $roles = [
          100 => 'Student',
          200 => 'Admin',
          202 => 'SuperAdmin',
          1000 => 'Student',
          1001 => 'Staff',
          1002 => 'Admin',

        ];

        $numRecords = count($seedData);
        $this->command->getOutput()->progressStart($numRecords);

        foreach ($seedData as $newRecord) {
            $user = User::create($newRecord);

            if (isset($roles[$user->id])) {
                $role = Role::where('name', $roles[$user->id])->first();
                if ($role) {
                    $user->assignRole($role);
                }
            }

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
        $this->testUsers();
    }

    public function testUsers(): void
    {
        // The top level array key (i.e. the role name) is used to assign role
        //  so it must be the same as the role's name NOT an alias.
        $seedData = [
            'SuperAdmin' => [
                // [
                //     'id'=>202,
                //     'given_name'=>'Chloe',
                //     'preferred_name'=>'Gu',
                //     'preferred_pronouns' => 'she/her',
                //     'email'=>'chloe@example.com',
                //     'password'=>Hash::make('Password1'),
                //     'profile_photo' => null,
                //     'email_verified_at'=>now(),
                // ],
            ],

            'Admin' => [
                [
                    'id' => 2,
                    'preferred_name' => '123123',
                    'given_name' => '123',
                    'family_name' => '123',
                    'email' => '123@123.com',
                    'password' => '123123123',
                    'email_verified_at' => now(),
                ],
                // [
                //     'id'=>100,
                //     'given_name'=>'Ad Ministrator',
                //     'preferred_name'=>'Ad',
                //     'preferred_pronouns' => 'he/him',
                //     'email'=>'admin@example.com',
                //     'password'=>Hash::make('Password1'),
                //     'profile_photo' => null,
                //     'email_verified_at'=>now(),
                // ],
                // [
                //     'id'=>200,
                //     'given_name'=>'Adrian',
                //     'preferred_name'=>'Gould',
                //     'preferred_pronouns' => 'he/him',
                //     'email'=>'adrain@example.com',
                //     'password'=>Hash::make('Password1'),
                //     'profile_photo' => null,
                //     'email_verified_at'=>null,
                // ],
                // [
                //     'id'=>1002,
                //     'given_name'=>'Robyn',
                //     'preferred_name'=>'Banks',
                //     'preferred_pronouns' => 'he/him',
                //     'email'=>'robyn@example.com',
                //     'password'=>Hash::make('Password1'),
                //     'profile_photo' => null,
                //     'email_verified_at'=>now(),
                // ],
            ],

            'Staff' => [
                [
                    'id' => 110,
                    'preferred_name' => 'The Staff',
                    'given_name' => 'staff',
                    'family_name' => 'staff',
                    'email' => 'staff@mail.com',
                    'password' => '123123123',
                    'email_verified_at' => now(),
                ],
                [
                    'id' => 203,
                    'preferred_name' => 'Corin Little',
                    'given_name' => 'Corin',
                    'family_name' => 'Little',
                    'preferred_pronouns' => 'he/him',
                    'email' => 'corin@gmail.com',
                    'password' => 'Password1',
                    'email_verified_at' => now(),
                ],
                [
                    'id' => 999,
                    'preferred_name' => 'Deletion Bait',
                    'given_name' => 'Good bye',
                    'family_name' => 'Cruel world',
                    'email' => 'del_100@iinet.com',
                    'password' => '123123123',
                ],
                // [
                //     'id'=>1001,
                //     'given_name'=>"Eileen Dover",
                //     'preferred_name'=>'Eileen',
                //     'preferred_pronouns' => 'he/him',
                //     'email'=>'eileen@example.com',
                //     'password'=>Hash::make('Password1'),
                //     'profile_photo' => null,
                //     'email_verified_at'=>now(),
                // ],
            ],

            'Student' => [
                [
                    'id' => 120,
                    'preferred_name' => 'The Student',
                    'given_name' => 'student',
                    'family_name' => 'study',
                    'email' => 'student@mail.com',
                    'password' => '123123123',
                ],
                [
                    'id' => 1003,
                    'preferred_name' => 'firsty lasty',
                    'given_name' => 'Firsty',
                    'family_name' => 'Lasty',
                    'email' => 'firsty_1@mail.com',
                    'password' => '123123123',
                    'email_verified_at' => now(),
                ],
                // [
                //     'id'=>1000,
                //     'given_name'=>"Jacques d'Carre",
                //     'preferred_name'=>'Jacques',
                //     'preferred_pronouns' => 'he/him',
                //     'email'=>'jacques@example.com',
                //     'password'=>Hash::make('Password1'),
                //     'profile_photo' => null,
                //     'email_verified_at'=>now(),
                // ],
            ],
        ];

        $numRecords = array_sum(array_map("count", $seedData));
        $this->command->getOutput()->progressStart($numRecords);

        // Loops through array using the top level array key to assign role to each user.
        foreach ($seedData as $roleName => $records) {
            // Loops through & creates all users for a role.
            foreach ($records as $newRecord) {
                User::create($newRecord)->assignRole($roleName);

                $this->command->getOutput()->progressAdvance();
            }
        }

        $this->command->getOutput()->progressFinish();
    }
}
