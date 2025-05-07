<?php

namespace Database\Seeders;

use App\Models\Cluster;
use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RolesPermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$this->call(RolesPermissionSeeder::class);
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PackageSeeder::class,
            CourseSeeder::class,
            ClusterSeeder::class,
            UnitSeeder::class,
            TimetableSeeder::class,
        ]);

        // Seeds pivot tables for testing.
        Course::find(1)->units()->attach([1,2,3,4,5]);
        Cluster::find(1)->units()->attach([1,2,3,4,5]);
    }
}
