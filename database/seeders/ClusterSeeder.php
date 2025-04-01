<?php

namespace Database\Seeders;

use App\Models\Cluster;
use App\Models\Course;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClusterSeeder extends Seeder
{
    public function run()
    {

        $clusters = [
            [
                'code' => 'ADVPROG',
                'title' => 'Advanced Programming',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'INTERIOT',
                'title' => 'Intermediate IoT',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'INTROPROG',
                'title' => 'Introduction to Programming',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'IP4RIoT',
                'title' => 'Introduction to Programming for IoT',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'IPOS',
                'title' => 'Intermediate Programming and Open Source',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'MOBDEV',
                'title' => 'Introduction to Mobile Development',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'SAAS-FED',
                'title' => 'Software as a Service - Front End Development',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'ADVMOB',
                'title' => 'Advanced Mobile Development',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'SAAS-BED',
                'title' => 'Software as a Service - Back End Development',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'CYBAWD',
                'title' => 'Cyber Awareness',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'BIGDAT',
                'title' => 'Big Data',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'INNOPRJ1',
                'title' => 'Innovation Project (Part 1)',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'INNOPRJ2',
                'title' => 'Innovation Project (Part 2)',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'IPETHPD',
                'title' => 'IP, Ethics & Privacy',
                'qualification' => 'ICT50220',
                'state_code' => 'AC21'
            ],
            [
                'code' => 'PROGC',
                'title' => 'Programming in another language (C#)',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'CYBSECR',
                'title' => 'Cyber Security Risk Management',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'ICTPROB',
                'title' => 'IT Support (Software)',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'COMPIP',
                'title' => 'Comply with IP, ethics and privacy policies in ICT environments',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'INNOPRO0',
                'title' => 'Innovation Project',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'APPYTHON',
                'title' => 'Applied Python Programming',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'MOBDEV',
                'title' => 'Mobile Development (C#/Xamarin)',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
            [
                'code' => 'WEBTECHP',
                'title' => 'Web Technologies (HTML, CSS and JS)',
                'qualification' => 'ICT40120',
                'state_code' => 'AC07'
            ],
        ];

        foreach ($clusters as $clusterData) {
            // 1. Get course using qualification
            /*$course = Course::where('national_code', $clusterData['qualification'])->first();

            if (!$course) {
                $this->command->error("Missing course: {$clusterData['qualification']}");
                continue;
            }*/

            $cluster = Cluster::create([
                'code' => $clusterData['code'],
                'title' => $clusterData['title'],
                'qualification' => $clusterData['qualification'],
                'state_code' => $clusterData['state_code'],
                // 'course_id' => $this->getCourseId($clusterData['qualification'])
            ]);
        }


    }

    /*private function getCourseId($qualification)
    {
        $course = Course::where('national_code', $qualification)->first();

        if (!$course) {
            $this->command->error("Course not found for qualification: {$qualification}");
            return null;
        }

        return $course->id;
    }*/


}
