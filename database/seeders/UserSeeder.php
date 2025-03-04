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
                'given_name'=>'Ad Ministrator',
                'preferred_name'=>'Ad',
                'preferred_pronouns' => 'he/him',
                'email'=>'admin@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => null,
                'email_verified_at'=>now(),


            ],

            [
                'id'=>200,
                'given_name'=>'Adrian',
                'preferred_name'=>'Gould',
                'preferred_pronouns' => 'he/him',
                'email'=>'adrain@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => null,
                'email_verified_at'=>now(),

            ],

            [
                'id'=>202,
                'given_name'=>'Chloe',
                'preferred_name'=>'Gu',
                'preferred_pronouns' => 'she/her',
                'email'=>'chloe@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => null,
                'email_verified_at'=>now(),


            ],

            [
                'id'=>1000,
                'given_name'=>"Jacques d'Carre",
                'preferred_name'=>'Jacques',
                'preferred_pronouns' => 'he/him',
                'email'=>'jacques@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => null,
                'email_verified_at'=>now(),
            ],

            [
                'id'=>1001,
                'given_name'=>"Eileen Dover",
                'preferred_name'=>'Eileen',
                'preferred_pronouns' => 'he/him',
                'email'=>'eileen@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => null,
                'email_verified_at'=>now(),
            ],

            [
                'id'=>1002,
                'given_name'=>'Robyn',
                'preferred_name'=>'Banks',
                'preferred_pronouns' => 'he/him',
                'email'=>'robyn@example.com',
                'password'=>Hash::make('Password1'),
                'profile_photo' => null,
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

    }
}
