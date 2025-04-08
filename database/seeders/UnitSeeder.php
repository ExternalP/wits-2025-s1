<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->getOutput()->progressStart();

        Unit::truncate();
        // $filePath = storage_path('/app/private/Unit_2_Sample.csv');
        $filePath = storage_path('/app/private/Unit_2.csv');
        $csvFile = fopen($filePath, 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Unit::create([
                    'id'            =>   $data['0'],
                    'national_code' =>   $data['1'] ?: 'NULL',
                    'title'     => rtrim($data['2'], ' '),
                    'tga_status'    =>   $data['3'] ?: 'Current',
                    'state_code'    =>   $data['4'] ?: 'NULL',
                    'nominal_hours' =>   $data['5'] ?: null,
                ]);
            }
            $firstline = false;

            $this->command->getOutput()->progressAdvance();
        }
        fclose($csvFile);

        $this->command->getOutput()->progressFinish();
    }
}
