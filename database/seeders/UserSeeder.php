<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'password'=>'Password1',
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

        $numRecords = count($seedData);
        $this->command->getOutput()->progressStart($numRecords);

        foreach ($seedData as $newRecord) {
            User::create($newRecord);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();

    }
}
