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
        // $csvFile = Storage::get('/app/private/Unit_2.csv');
        // $filePath = base_path('storage/app/private/Unit_2.csv');
        $filePath = storage_path('/app/private/Unit_2.csv');
        $csvFile = fopen($filePath, 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Unit::create([
                    'national_code' => $data['0'] ?: 'NULL',
                    'title' => rtrim($data['1'], ' '),
                    'tga_status' => $data['2'] ?: 'Current',
                    'state_code' => $data['3'] ?: 'NULL',
                    'nominal_hours' => $data['4'] ?: null,
                ]);
            }
            $firstline = false;

            $this->command->getOutput()->progressAdvance();
        }
        fclose($csvFile);

        $this->command->getOutput()->progressFinish();
    }
}
