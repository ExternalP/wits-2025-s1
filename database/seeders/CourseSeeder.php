<?php
/**
 * Seeds (default/initial data) the database with courses.
 * * - Is called by DatabaseSeeder.php
 * * - PackageSeeder.php must be initialized first due to foreign key.
 *
 * Filename:        CourseSeeder.php
 * Location:        database/seeders/
 * Project:         wits-2025-s1
 * Date Created:    25/02/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 * Student ID:      20135656
 *
 * Assessment:      WITS-2025-S1
 * Cluster:         SaaS: Part 2 – Back End Development
 * Qualification:   ICT50220 Diploma of Information Technology (Back End Web Development)
 * Year/Semester:   2025/S1
 *
 */

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                "package_id" => "1",
                "national_code" => "BSB10115",
                "aqf_level" => "Certificate I in",
                "title" => "Business",
                "tga_status" => "Current",
                "state_code" => "AVU7",
                "nominal_hours" => "150",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB20115",
                "aqf_level" => "Certificate II in",
                "title" => "Business",
                "tga_status" => "Current",
                "state_code" => "AVU8",
                "nominal_hours" => "325",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB20215",
                "aqf_level" => "Certificate II in",
                "title" => "Customer Engagement",
                "tga_status" => "Current",
                "state_code" => "AVQ9",
                "nominal_hours" => "385",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30115",
                "aqf_level" => "Certificate III in",
                "title" => "Business",
                "tga_status" => "Current",
                "state_code" => "AVR7",
                "nominal_hours" => "420",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30215",
                "aqf_level" => "Certificate III in",
                "title" => "Customer Engagement",
                "tga_status" => "Current",
                "state_code" => "AVS6",
                "nominal_hours" => "385",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30315",
                "aqf_level" => "Certificate III in",
                "title" => "Micro Business Operations",
                "tga_status" => "Current",
                "state_code" => "AVT8",
                "nominal_hours" => "380",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30415",
                "aqf_level" => "Certificate III in",
                "title" => "Business Administration",
                "tga_status" => "Current",
                "state_code" => "AVS2",
                "nominal_hours" => "420",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30515",
                "aqf_level" => "Certificate III in",
                "title" => "Business Administration (International Education)",
                "tga_status" => "Current",
                "state_code" => "AVR6",
                "nominal_hours" => "485",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30615",
                "aqf_level" => "Certificate III in",
                "title" => "International Trade",
                "tga_status" => "Current",
                "state_code" => "AVS0",
                "nominal_hours" => "390",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30715",
                "aqf_level" => "Certificate III in",
                "title" => "Work Health and Safety",
                "tga_status" => "Current",
                "state_code" => "AVV3",
                "nominal_hours" => "305",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30815",
                "aqf_level" => "Certificate III in",
                "title" => "Recordkeeping",
                "tga_status" => "Current",
                "state_code" => "AVS7",
                "nominal_hours" => "375",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB30915",
                "aqf_level" => "Certificate III in",
                "title" => "Business Administration (Education)",
                "tga_status" => "Current",
                "state_code" => "AVV0",
                "nominal_hours" => "400",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB31015",
                "aqf_level" => "Certificate III in",
                "title" => "Business Administration (Legal)",
                "tga_status" => "Current",
                "state_code" => "AVQ6",
                "nominal_hours" => "370",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB31115",
                "aqf_level" => "Certificate III in",
                "title" => "Business Administration (Medical)",
                "tga_status" => "Current",
                "state_code" => "AVT0",
                "nominal_hours" => "425",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB31215",
                "aqf_level" => "Certificate III in",
                "title" => "Library and Information Services",
                "tga_status" => "Current",
                "state_code" => "AZK2",
                "nominal_hours" => "538",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB40115",
                "aqf_level" => "Certificate IV in",
                "title" => "Advertising",
                "tga_status" => "Replaced",
                "state_code" => "AVQ7",
                "nominal_hours" => "450",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB40215",
                "aqf_level" => "Certificate IV in",
                "title" => "Business",
                "tga_status" => "Current",
                "state_code" => "AVV9",
                "nominal_hours" => "515",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB40315",
                "aqf_level" => "Certificate IV in",
                "title" => "Customer Engagement",
                "tga_status" => "Current",
                "state_code" => "AVW0",
                "nominal_hours" => "585",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB40415",
                "aqf_level" => "Certificate IV in",
                "title" => "Small Business Management",
                "tga_status" => "Replaced",
                "state_code" => "AVU6",
                "nominal_hours" => "420",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB40515",
                "aqf_level" => "Certificate IV in",
                "title" => "Business Administration",
                "tga_status" => "Current",
                "state_code" => "AVS9",
                "nominal_hours" => "530",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB40615",
                "aqf_level" => "Certificate IV in",
                "title" => "Business Sales",
                "tga_status" => "Current",
                "state_code" => "AVS8",
                "nominal_hours" => "410",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB40715",
                "aqf_level" => "Certificate IV in",
                "title" => "Franchising",
                "tga_status" => "Current",
                "state_code" => "AVT4",
                "nominal_hours" => "410",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB40915",
                "aqf_level" => "Certificate IV in",
                "title" => "Governance",
                "tga_status" => "Current",
                "state_code" => "AVR5",
                "nominal_hours" => "420",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB41015",
                "aqf_level" => "Certificate IV in",
                "title" => "Human Resources",
                "tga_status" => "Current",
                "state_code" => "AVT3",
                "nominal_hours" => "415",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB41115",
                "aqf_level" => "Certificate IV in",
                "title" => "International Trade",
                "tga_status" => "Current",
                "state_code" => "AVU1",
                "nominal_hours" => "440",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB41315",
                "aqf_level" => "Certificate IV in",
                "title" => "Marketing",
                "tga_status" => "Replaced",
                "state_code" => "AVS4",
                "nominal_hours" => "440",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB41415",
                "aqf_level" => "Certificate IV in",
                "title" => "Work Health and Safety",
                "tga_status" => "Current",
                "state_code" => "AVW3",
                "nominal_hours" => "470",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB41515",
                "aqf_level" => "Certificate IV in",
                "title" => "Project Management Practice",
                "tga_status" => "Current",
                "state_code" => "AVR2",
                "nominal_hours" => "330",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB41615",
                "aqf_level" => "Certificate IV in",
                "title" => "Purchasing",
                "tga_status" => "Current",
                "state_code" => "AVV7",
                "nominal_hours" => "420",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB41715",
                "aqf_level" => "Certificate IV in",
                "title" => "Recordkeeping",
                "tga_status" => "Current",
                "state_code" => "AVV1",
                "nominal_hours" => "415",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB41915",
                "aqf_level" => "Certificate IV in",
                "title" => "Business (Governance)",
                "tga_status" => "Current",
                "state_code" => "AVU3",
                "nominal_hours" => "530",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB42015",
                "aqf_level" => "Certificate IV in",
                "title" => "Leadership and Management",
                "tga_status" => "Current",
                "state_code" => "AVR3",
                "nominal_hours" => "460",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB42115",
                "aqf_level" => "Certificate IV in",
                "title" => "Library and Information Services",
                "tga_status" => "Current",
                "state_code" => "AZK3",
                "nominal_hours" => "712",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB42215",
                "aqf_level" => "Certificate IV in",
                "title" => "Legal Services",
                "tga_status" => "Current",
                "state_code" => "AVR9",
                "nominal_hours" => "620",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB42315",
                "aqf_level" => "Certificate IV in",
                "title" => "Environmental Management and Sustainability",
                "tga_status" => "Current",
                "state_code" => "AZJ9",
                "nominal_hours" => "305",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB42415",
                "aqf_level" => "Certificate IV in",
                "title" => "Marketing and Communication",
                "tga_status" => "Current",
                "state_code" => "AZJ8",
                "nominal_hours" => "495",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB42515",
                "aqf_level" => "Certificate IV in",
                "title" => "Small Business Management",
                "tga_status" => "Current",
                "state_code" => "AZI9",
                "nominal_hours" => "430",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB42615",
                "aqf_level" => "Certificate IV in",
                "title" => "New Small Business",
                "tga_status" => "Current",
                "state_code" => "AZI1",
                "nominal_hours" => "420",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB50115",
                "aqf_level" => "Diploma of",
                "title" => "Advertising",
                "tga_status" => "Replaced",
                "state_code" => "AVU4",
                "nominal_hours" => "500",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB50215",
                "aqf_level" => "Diploma of",
                "title" => "Business",
                "tga_status" => "Current",
                "state_code" => "AVU9",
                "nominal_hours" => "405",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB50315",
                "aqf_level" => "Diploma of",
                "title" => "Customer Engagement",
                "tga_status" => "Current",
                "state_code" => "AVV8",
                "nominal_hours" => "550",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB50415",
                "aqf_level" => "Diploma of",
                "title" => "Business Administration",
                "tga_status" => "Current",
                "state_code" => "AVV5",
                "nominal_hours" => "415",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB50515",
                "aqf_level" => "Diploma of",
                "title" => "Franchising",
                "tga_status" => "Current",
                "state_code" => "AVT2",
                "nominal_hours" => "380",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB50615",
                "aqf_level" => "Diploma of",
                "title" => "Human Resources Management",
                "tga_status" => "Current",
                "state_code" => "AVT7",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB50715",
                "aqf_level" => "Diploma of",
                "title" => "Business (Governance)",
                "tga_status" => "Current",
                "state_code" => "AVU2",
                "nominal_hours" => "610",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB50815",
                "aqf_level" => "Diploma of",
                "title" => "International Business",
                "tga_status" => "Current",
                "state_code" => "AVT5",
                "nominal_hours" => "370",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB51215",
                "aqf_level" => "Diploma of",
                "title" => "Marketing",
                "tga_status" => "Replaced",
                "state_code" => "AVW6",
                "nominal_hours" => "390",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB51315",
                "aqf_level" => "Diploma of",
                "title" => "Work Health and Safety",
                "tga_status" => "Current",
                "state_code" => "AVV6",
                "nominal_hours" => "450",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB51415",
                "aqf_level" => "Diploma of",
                "title" => "Project Management",
                "tga_status" => "Current",
                "state_code" => "AVW5",
                "nominal_hours" => "530",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB51515",
                "aqf_level" => "Diploma of",
                "title" => "Purchasing",
                "tga_status" => "Current",
                "state_code" => "AVW1",
                "nominal_hours" => "405",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB51615",
                "aqf_level" => "Diploma of",
                "title" => "Quality Auditing",
                "tga_status" => "Current",
                "state_code" => "AVS3",
                "nominal_hours" => "355",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB51715",
                "aqf_level" => "Diploma of",
                "title" => "Recordkeeping",
                "tga_status" => "Current",
                "state_code" => "AVW7",
                "nominal_hours" => "360",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB51915",
                "aqf_level" => "Diploma of",
                "title" => "Leadership and Management",
                "tga_status" => "Current",
                "state_code" => "AVU0",
                "nominal_hours" => "665",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB52015",
                "aqf_level" => "Diploma of",
                "title" => "Conveyancing",
                "tga_status" => "Current",
                "state_code" => "AVV4",
                "nominal_hours" => "625",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB52115",
                "aqf_level" => "Diploma of",
                "title" => "Library and Information Services",
                "tga_status" => "Current",
                "state_code" => "AZJ4",
                "nominal_hours" => "1165",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB52215",
                "aqf_level" => "Diploma of",
                "title" => "Legal Services",
                "tga_status" => "Current",
                "state_code" => "AVS5",
                "nominal_hours" => "480",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB52315",
                "aqf_level" => "Diploma of",
                "title" => "Governance",
                "tga_status" => "Current",
                "state_code" => "AZJ0",
                "nominal_hours" => "590",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB52415",
                "aqf_level" => "Diploma of",
                "title" => "Marketing and Communication",
                "tga_status" => "Current",
                "state_code" => "AZK1",
                "nominal_hours" => "625",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB60115",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Advertising",
                "tga_status" => "Replaced",
                "state_code" => "AVW2",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB60215",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Business",
                "tga_status" => "Current",
                "state_code" => "AVV2",
                "nominal_hours" => "450",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB60515",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Marketing",
                "tga_status" => "Replaced",
                "state_code" => "AVS1",
                "nominal_hours" => "460",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB60615",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Work Health and Safety",
                "tga_status" => "Current",
                "state_code" => "AVR0",
                "nominal_hours" => "460",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB60815",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Recordkeeping",
                "tga_status" => "Current",
                "state_code" => "AVT9",
                "nominal_hours" => "430",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB60915",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Management (Human Resources)",
                "tga_status" => "Current",
                "state_code" => "AVR1",
                "nominal_hours" => "410",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB61015",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Leadership and Management",
                "tga_status" => "Current",
                "state_code" => "AVW8",
                "nominal_hours" => "720",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB61115",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Conveyancing",
                "tga_status" => "Current",
                "state_code" => "AVU5",
                "nominal_hours" => "935",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB61215",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Program Management",
                "tga_status" => "Current",
                "state_code" => "AVR8",
                "nominal_hours" => "625",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB61315",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Marketing and Communication",
                "tga_status" => "Current",
                "state_code" => "AZJ7",
                "nominal_hours" => "730",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB80215",
                "aqf_level" => "Graduate Diploma of",
                "title" => "Strategic Leadership",
                "tga_status" => "Current",
                "state_code" => "AVT1",
                "nominal_hours" => "630",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB80315",
                "aqf_level" => "Graduate Certificate In",
                "title" => "Leadership Diversity",
                "tga_status" => "Current",
                "state_code" => "AVQ8",
                "nominal_hours" => "290",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB80415",
                "aqf_level" => "Graduate Diploma of",
                "title" => "Portfolio Management",
                "tga_status" => "Current",
                "state_code" => "AVW4",
                "nominal_hours" => "590",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB80515",
                "aqf_level" => "Graduate Certificate In",
                "title" => "Management (Learning)",
                "tga_status" => "Current",
                "state_code" => "AZH7",
                "nominal_hours" => "320",
                "type" => "Qualification"
            ],
            [
                "package_id" => "1",
                "national_code" => "BSB80615",
                "aqf_level" => "Graduate Diploma of",
                "title" => "Management (Learning)",
                "tga_status" => "Current",
                "state_code" => "AZJ1",
                "nominal_hours" => "590",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA10113",
                "aqf_level" => "Certificate I in",
                "title" => "Dance",
                "tga_status" => "Current",
                "state_code" => "J690",
                "nominal_hours" => "180",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA10113",
                "aqf_level" => "Certificate I in",
                "title" => "Dance",
                "tga_status" => "Current",
                "state_code" => "J690",
                "nominal_hours" => "180",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA10215",
                "aqf_level" => "Certificate I in",
                "title" => "Aboriginal and Torres Strait Islander Cultural Arts",
                "tga_status" => "Current",
                "state_code" => "AZN3",
                "nominal_hours" => "225",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA10215",
                "aqf_level" => "Certificate I in",
                "title" => "Aboriginal and Torres Strait Islander Cultural Arts",
                "tga_status" => "Current",
                "state_code" => "AZN3",
                "nominal_hours" => "225",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA10315",
                "aqf_level" => "Certificate I in",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZK5",
                "nominal_hours" => "215",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA10315",
                "aqf_level" => "Certificate I in",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZK5",
                "nominal_hours" => "215",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20113",
                "aqf_level" => "Certificate II in",
                "title" => "Dance",
                "tga_status" => "Current",
                "state_code" => "J691",
                "nominal_hours" => "380",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20113",
                "aqf_level" => "Certificate II in",
                "title" => "Dance",
                "tga_status" => "Current",
                "state_code" => "J691",
                "nominal_hours" => "380",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20215",
                "aqf_level" => "Certificate II in",
                "title" => "Creative Industries",
                "tga_status" => "Current",
                "state_code" => "AZN1",
                "nominal_hours" => "250",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20215",
                "aqf_level" => "Certificate II in",
                "title" => "Creative Industries",
                "tga_status" => "Current",
                "state_code" => "AZN1",
                "nominal_hours" => "250",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20315",
                "aqf_level" => "Certificate II in",
                "title" => "Aboriginal and Torres Strait Islander Visual Arts Industry Work",
                "tga_status" => "Current",
                "state_code" => "AZL0",
                "nominal_hours" => "250",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20315",
                "aqf_level" => "Certificate II in",
                "title" => "Aboriginal and Torres Strait Islander Visual Arts Industry Work",
                "tga_status" => "Current",
                "state_code" => "AZL0",
                "nominal_hours" => "250",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20415",
                "aqf_level" => "Certificate II in",
                "title" => "Aboriginal and Torres Strait Islander Cultural Arts",
                "tga_status" => "Current",
                "state_code" => "AZN8",
                "nominal_hours" => "365",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20415",
                "aqf_level" => "Certificate II in",
                "title" => "Aboriginal and Torres Strait Islander Cultural Arts",
                "tga_status" => "Current",
                "state_code" => "AZN8",
                "nominal_hours" => "365",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20515",
                "aqf_level" => "Certificate II in",
                "title" => "Information and Cultural Services",
                "tga_status" => "Current",
                "state_code" => "AZM9",
                "nominal_hours" => "363",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20515",
                "aqf_level" => "Certificate II in",
                "title" => "Information and Cultural Services",
                "tga_status" => "Current",
                "state_code" => "AZM9",
                "nominal_hours" => "363",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20615",
                "aqf_level" => "Certificate II in",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZM6",
                "nominal_hours" => "260",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20615",
                "aqf_level" => "Certificate II in",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZM6",
                "nominal_hours" => "260",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20715",
                "aqf_level" => "Certificate II in",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZN4",
                "nominal_hours" => "355",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA20715",
                "aqf_level" => "Certificate II in",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZN4",
                "nominal_hours" => "355",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30113",
                "aqf_level" => "Certificate III in",
                "title" => "Dance",
                "tga_status" => "Current",
                "state_code" => "J693",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30113",
                "aqf_level" => "Certificate III in",
                "title" => "Dance",
                "tga_status" => "Current",
                "state_code" => "J693",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30213",
                "aqf_level" => "Certificate III in",
                "title" => "Community Dance, Theatre and Events",
                "tga_status" => "Current",
                "state_code" => "J694",
                "nominal_hours" => "550",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30213",
                "aqf_level" => "Certificate III in",
                "title" => "Community Dance, Theatre and Events",
                "tga_status" => "Current",
                "state_code" => "J694",
                "nominal_hours" => "550",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30313",
                "aqf_level" => "Certificate III in",
                "title" => "Assistant Dance Teaching",
                "tga_status" => "Current",
                "state_code" => "J695",
                "nominal_hours" => "360",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30313",
                "aqf_level" => "Certificate III in",
                "title" => "Assistant Dance Teaching",
                "tga_status" => "Current",
                "state_code" => "J695",
                "nominal_hours" => "360",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30415",
                "aqf_level" => "Certificate III in",
                "title" => "Live Production and Services",
                "tga_status" => "Current",
                "state_code" => "AZM4",
                "nominal_hours" => "489",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30415",
                "aqf_level" => "Certificate III in",
                "title" => "Live Production and Services",
                "tga_status" => "Current",
                "state_code" => "AZM4",
                "nominal_hours" => "489",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30515",
                "aqf_level" => "Certificate III in",
                "title" => "Aboriginal and Torres Strait Islander Cultural Arts",
                "tga_status" => "Current",
                "state_code" => "AZN9",
                "nominal_hours" => "535",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30515",
                "aqf_level" => "Certificate III in",
                "title" => "Aboriginal and Torres Strait Islander Cultural Arts",
                "tga_status" => "Current",
                "state_code" => "AZN9",
                "nominal_hours" => "535",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30615",
                "aqf_level" => "Certificate III in",
                "title" => "Arts Administration",
                "tga_status" => "Current",
                "state_code" => "AZM8",
                "nominal_hours" => "490",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30615",
                "aqf_level" => "Certificate III in",
                "title" => "Arts Administration",
                "tga_status" => "Current",
                "state_code" => "AZM8",
                "nominal_hours" => "490",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30715",
                "aqf_level" => "Certificate III in",
                "title" => "Design Fundamentals",
                "tga_status" => "Current",
                "state_code" => "AZN7",
                "nominal_hours" => "515",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30715",
                "aqf_level" => "Certificate III in",
                "title" => "Design Fundamentals",
                "tga_status" => "Current",
                "state_code" => "AZN7",
                "nominal_hours" => "515",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30815",
                "aqf_level" => "Certificate III in",
                "title" => "Broadcast Technology",
                "tga_status" => "Current",
                "state_code" => "AZM3",
                "nominal_hours" => "435",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30815",
                "aqf_level" => "Certificate III in",
                "title" => "Broadcast Technology",
                "tga_status" => "Current",
                "state_code" => "AZM3",
                "nominal_hours" => "435",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30915",
                "aqf_level" => "Certificate III in",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZK9",
                "nominal_hours" => "345",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA30915",
                "aqf_level" => "Certificate III in",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZK9",
                "nominal_hours" => "345",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA31015",
                "aqf_level" => "Certificate III in",
                "title" => "Screen and Media",
                "tga_status" => "Current",
                "state_code" => "AZO4",
                "nominal_hours" => "400",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA31015",
                "aqf_level" => "Certificate III in",
                "title" => "Screen and Media",
                "tga_status" => "Current",
                "state_code" => "AZO4",
                "nominal_hours" => "400",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA31115",
                "aqf_level" => "Certificate III in",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZN2",
                "nominal_hours" => "535",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA31115",
                "aqf_level" => "Certificate III in",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZN2",
                "nominal_hours" => "535",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40113",
                "aqf_level" => "Certificate IV in",
                "title" => "Dance",
                "tga_status" => "Current",
                "state_code" => "J697",
                "nominal_hours" => "690",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40113",
                "aqf_level" => "Certificate IV in",
                "title" => "Dance",
                "tga_status" => "Current",
                "state_code" => "J697",
                "nominal_hours" => "690",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40213",
                "aqf_level" => "Certificate IV in",
                "title" => "Community Culture",
                "tga_status" => "Current",
                "state_code" => "J698",
                "nominal_hours" => "745",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40213",
                "aqf_level" => "Certificate IV in",
                "title" => "Community Culture",
                "tga_status" => "Current",
                "state_code" => "J698",
                "nominal_hours" => "745",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40313",
                "aqf_level" => "Certificate IV in",
                "title" => "Dance Teaching and Management",
                "tga_status" => "Current",
                "state_code" => "J699",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40313",
                "aqf_level" => "Certificate IV in",
                "title" => "Dance Teaching and Management",
                "tga_status" => "Current",
                "state_code" => "J699",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40415",
                "aqf_level" => "Certificate IV in",
                "title" => "Live Production and Technical Services",
                "tga_status" => "Current",
                "state_code" => "AZO0",
                "nominal_hours" => "664",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40415",
                "aqf_level" => "Certificate IV in",
                "title" => "Live Production and Technical Services",
                "tga_status" => "Current",
                "state_code" => "AZO0",
                "nominal_hours" => "664",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40513",
                "aqf_level" => "Certificate IV in",
                "title" => "Musical Theatre",
                "tga_status" => "Current",
                "state_code" => "J701",
                "nominal_hours" => "825",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40513",
                "aqf_level" => "Certificate IV in",
                "title" => "Musical Theatre",
                "tga_status" => "Current",
                "state_code" => "J701",
                "nominal_hours" => "825",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40615",
                "aqf_level" => "Certificate IV in",
                "title" => "Aboriginal and Torres Strait Islander Cultural Arts",
                "tga_status" => "Current",
                "state_code" => "AZK4",
                "nominal_hours" => "660",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40615",
                "aqf_level" => "Certificate IV in",
                "title" => "Aboriginal and Torres Strait Islander Cultural Arts",
                "tga_status" => "Current",
                "state_code" => "AZK4",
                "nominal_hours" => "660",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40715",
                "aqf_level" => "Certificate IV in",
                "title" => "Design",
                "tga_status" => "Current",
                "state_code" => "AZN5",
                "nominal_hours" => "665",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40715",
                "aqf_level" => "Certificate IV in",
                "title" => "Design",
                "tga_status" => "Current",
                "state_code" => "AZN5",
                "nominal_hours" => "665",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40815",
                "aqf_level" => "Certificate IV in",
                "title" => "Arts Administration",
                "tga_status" => "Current",
                "state_code" => "AZL4",
                "nominal_hours" => "640",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40815",
                "aqf_level" => "Certificate IV in",
                "title" => "Arts Administration",
                "tga_status" => "Current",
                "state_code" => "AZL4",
                "nominal_hours" => "640",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40915",
                "aqf_level" => "Certificate IV in",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZN6",
                "nominal_hours" => "535",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA40915",
                "aqf_level" => "Certificate IV in",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZN6",
                "nominal_hours" => "535",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA41015",
                "aqf_level" => "Certificate IV in",
                "title" => "Broadcast Technology",
                "tga_status" => "Current",
                "state_code" => "AZL2",
                "nominal_hours" => "640",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA41015",
                "aqf_level" => "Certificate IV in",
                "title" => "Broadcast Technology",
                "tga_status" => "Current",
                "state_code" => "AZL2",
                "nominal_hours" => "640",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA41115",
                "aqf_level" => "Certificate IV in",
                "title" => "Photography and Photo Imaging",
                "tga_status" => "Current",
                "state_code" => "AZM5",
                "nominal_hours" => "640",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA41115",
                "aqf_level" => "Certificate IV in",
                "title" => "Photography and Photo Imaging",
                "tga_status" => "Current",
                "state_code" => "AZM5",
                "nominal_hours" => "640",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA41215",
                "aqf_level" => "Certificate IV in",
                "title" => "Screen and Media",
                "tga_status" => "Current",
                "state_code" => "AZK7",
                "nominal_hours" => "570",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA41215",
                "aqf_level" => "Certificate IV in",
                "title" => "Screen and Media",
                "tga_status" => "Current",
                "state_code" => "AZK7",
                "nominal_hours" => "570",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA41315",
                "aqf_level" => "Certificate IV in",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZO2",
                "nominal_hours" => "630",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA41315",
                "aqf_level" => "Certificate IV in",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZO2",
                "nominal_hours" => "630",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50113",
                "aqf_level" => "Diploma of",
                "title" => "Dance (Elite Performance)",
                "tga_status" => "Current",
                "state_code" => "J702",
                "nominal_hours" => "1358",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50113",
                "aqf_level" => "Diploma of",
                "title" => "Dance (Elite Performance)",
                "tga_status" => "Current",
                "state_code" => "J702",
                "nominal_hours" => "1358",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50213",
                "aqf_level" => "Diploma of",
                "title" => "Musical Theatre",
                "tga_status" => "Current",
                "state_code" => "J703",
                "nominal_hours" => "985",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50213",
                "aqf_level" => "Diploma of",
                "title" => "Musical Theatre",
                "tga_status" => "Current",
                "state_code" => "J703",
                "nominal_hours" => "985",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50313",
                "aqf_level" => "Diploma of",
                "title" => "Dance Teaching and Management",
                "tga_status" => "Current",
                "state_code" => "J704",
                "nominal_hours" => "960",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50313",
                "aqf_level" => "Diploma of",
                "title" => "Dance Teaching and Management",
                "tga_status" => "Current",
                "state_code" => "J704",
                "nominal_hours" => "960",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50415",
                "aqf_level" => "Diploma of",
                "title" => "Live Production and Technical Services",
                "tga_status" => "Current",
                "state_code" => "AZK8",
                "nominal_hours" => "1009",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50415",
                "aqf_level" => "Diploma of",
                "title" => "Live Production and Technical Services",
                "tga_status" => "Current",
                "state_code" => "AZK8",
                "nominal_hours" => "1009",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50513",
                "aqf_level" => "Diploma of",
                "title" => "Live Production Design",
                "tga_status" => "Current",
                "state_code" => "J706",
                "nominal_hours" => "1020",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50513",
                "aqf_level" => "Diploma of",
                "title" => "Live Production Design",
                "tga_status" => "Current",
                "state_code" => "J706",
                "nominal_hours" => "1020",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50615",
                "aqf_level" => "Diploma of",
                "title" => "Aboriginal and Torres Strait Islander Visual Arts Industry Work",
                "tga_status" => "Current",
                "state_code" => "AZM1",
                "nominal_hours" => "650",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50615",
                "aqf_level" => "Diploma of",
                "title" => "Aboriginal and Torres Strait Islander Visual Arts Industry Work",
                "tga_status" => "Current",
                "state_code" => "AZM1",
                "nominal_hours" => "650",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50715",
                "aqf_level" => "Diploma of",
                "title" => "Graphic Design",
                "tga_status" => "Current",
                "state_code" => "AZK6",
                "nominal_hours" => "920",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50715",
                "aqf_level" => "Diploma of",
                "title" => "Graphic Design",
                "tga_status" => "Current",
                "state_code" => "AZK6",
                "nominal_hours" => "920",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50815",
                "aqf_level" => "Diploma of",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZN0",
                "nominal_hours" => "757",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50815",
                "aqf_level" => "Diploma of",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZN0",
                "nominal_hours" => "757",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50915",
                "aqf_level" => "Diploma of",
                "title" => "Photography and Photo Imaging",
                "tga_status" => "Current",
                "state_code" => "AZM2",
                "nominal_hours" => "950",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA50915",
                "aqf_level" => "Diploma of",
                "title" => "Photography and Photo Imaging",
                "tga_status" => "Current",
                "state_code" => "AZM2",
                "nominal_hours" => "950",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA51015",
                "aqf_level" => "Diploma of",
                "title" => "Screen and Media",
                "tga_status" => "Current",
                "state_code" => "AZL8",
                "nominal_hours" => "705",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA51015",
                "aqf_level" => "Diploma of",
                "title" => "Screen and Media",
                "tga_status" => "Current",
                "state_code" => "AZL8",
                "nominal_hours" => "705",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA51115",
                "aqf_level" => "Diploma of",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZL3",
                "nominal_hours" => "744",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA51115",
                "aqf_level" => "Diploma of",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZL3",
                "nominal_hours" => "744",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA51215",
                "aqf_level" => "Diploma of",
                "title" => "Ceramics",
                "tga_status" => "Current",
                "state_code" => "AZL1",
                "nominal_hours" => "1010",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA51215",
                "aqf_level" => "Diploma of",
                "title" => "Ceramics",
                "tga_status" => "Current",
                "state_code" => "AZL1",
                "nominal_hours" => "1010",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60113",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Dance (Elite Performance)",
                "tga_status" => "Current",
                "state_code" => "J707",
                "nominal_hours" => "1735",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60113",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Dance (Elite Performance)",
                "tga_status" => "Current",
                "state_code" => "J707",
                "nominal_hours" => "1735",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60213",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Live Production and Management Services",
                "tga_status" => "Current",
                "state_code" => "J708",
                "nominal_hours" => "1080",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60213",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Live Production and Management Services",
                "tga_status" => "Current",
                "state_code" => "J708",
                "nominal_hours" => "1080",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60315",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Graphic Design",
                "tga_status" => "Current",
                "state_code" => "AZL7",
                "nominal_hours" => "760",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60315",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Graphic Design",
                "tga_status" => "Current",
                "state_code" => "AZL7",
                "nominal_hours" => "760",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60415",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Creative Product Development",
                "tga_status" => "Current",
                "state_code" => "AZL9",
                "nominal_hours" => "770",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60415",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Creative Product Development",
                "tga_status" => "Current",
                "state_code" => "AZL9",
                "nominal_hours" => "770",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60515",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZM7",
                "nominal_hours" => "752",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60515",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Music Industry",
                "tga_status" => "Current",
                "state_code" => "AZM7",
                "nominal_hours" => "752",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60615",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Screen and Media",
                "tga_status" => "Current",
                "state_code" => "AZO1",
                "nominal_hours" => "785",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60615",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Screen and Media",
                "tga_status" => "Current",
                "state_code" => "AZO1",
                "nominal_hours" => "785",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60715",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZL6",
                "nominal_hours" => "675",
                "type" => "Qualification"
            ],
            [
                "package_id" => "2",
                "national_code" => "CUA60715",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Visual Arts",
                "tga_status" => "Current",
                "state_code" => "AZL6",
                "nominal_hours" => "675",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS10115",
                "aqf_level" => "Certificate I in",
                "title" => "Financial Services",
                "tga_status" => "Current",
                "state_code" => "AWB1",
                "nominal_hours" => "180",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS20115",
                "aqf_level" => "Certificate II in",
                "title" => "Financial Services",
                "tga_status" => "Current",
                "state_code" => "AVX4",
                "nominal_hours" => "270",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS30115",
                "aqf_level" => "Certificate III in",
                "title" => "Financial Services",
                "tga_status" => "Current",
                "state_code" => "AWA5",
                "nominal_hours" => "450",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS30215",
                "aqf_level" => "Certificate III in",
                "title" => "Personal Injury Management",
                "tga_status" => "Current",
                "state_code" => "AVX0",
                "nominal_hours" => "390",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS30315",
                "aqf_level" => "Certificate III in",
                "title" => "Accounts Administration",
                "tga_status" => "Current",
                "state_code" => "AWA4",
                "nominal_hours" => "440",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS30515",
                "aqf_level" => "Certificate III in",
                "title" => "General Insurance",
                "tga_status" => "Current",
                "state_code" => "AVZ8",
                "nominal_hours" => "425",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS30615",
                "aqf_level" => "Certificate III in",
                "title" => "Insurance Broking",
                "tga_status" => "Current",
                "state_code" => "AVZ3",
                "nominal_hours" => "420",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS40115",
                "aqf_level" => "Certificate IV in",
                "title" => "Credit Management",
                "tga_status" => "Current",
                "state_code" => "AWC3",
                "nominal_hours" => "345",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS40215",
                "aqf_level" => "Certificate IV in",
                "title" => "Bookkeeping",
                "tga_status" => "Current",
                "state_code" => "AWB2",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS40615",
                "aqf_level" => "Certificate IV in",
                "title" => "Accounting",
                "tga_status" => "Current",
                "state_code" => "AWF3",
                "nominal_hours" => "595",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS40715",
                "aqf_level" => "Certificate IV in",
                "title" => "Financial Practice Support",
                "tga_status" => "Current",
                "state_code" => "AWC4",
                "nominal_hours" => "430",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS40815",
                "aqf_level" => "Certificate IV in",
                "title" => "Finance and Mortgage Broking",
                "tga_status" => "Current",
                "state_code" => "AWF6",
                "nominal_hours" => "355",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS40915",
                "aqf_level" => "Certificate IV in",
                "title" => "Superannuation",
                "tga_status" => "Current",
                "state_code" => "AVZ0",
                "nominal_hours" => "500",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS41115",
                "aqf_level" => "Certificate IV in",
                "title" => "Financial Markets Operations",
                "tga_status" => "Current",
                "state_code" => "AVY5",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS41415",
                "aqf_level" => "Certificate IV in",
                "title" => "General Insurance",
                "tga_status" => "Current",
                "state_code" => "AWD0",
                "nominal_hours" => "630",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS41515",
                "aqf_level" => "Certificate IV in",
                "title" => "Life Insurance",
                "tga_status" => "Current",
                "state_code" => "AVX2",
                "nominal_hours" => "470",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS41715",
                "aqf_level" => "Certificate IV in",
                "title" => "Insurance Broking",
                "tga_status" => "Current",
                "state_code" => "AWG0",
                "nominal_hours" => "510",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS41815",
                "aqf_level" => "Certificate IV in",
                "title" => "Financial Services",
                "tga_status" => "Current",
                "state_code" => "AVY4",
                "nominal_hours" => "510",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS42015",
                "aqf_level" => "Certificate IV in",
                "title" => "Banking Services",
                "tga_status" => "Current",
                "state_code" => "AVZ5",
                "nominal_hours" => "390",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS50215",
                "aqf_level" => "Diploma of",
                "title" => "Accounting",
                "tga_status" => "Current",
                "state_code" => "AVX7",
                "nominal_hours" => "580",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS50315",
                "aqf_level" => "Diploma of",
                "title" => "Finance and Mortgage Broking Management",
                "tga_status" => "Current",
                "state_code" => "AWC1",
                "nominal_hours" => "660",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS50615",
                "aqf_level" => "Diploma of",
                "title" => "Financial Planning",
                "tga_status" => "Current",
                "state_code" => "AVX5",
                "nominal_hours" => "780",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS50715",
                "aqf_level" => "Diploma of",
                "title" => "Superannuation",
                "tga_status" => "Current",
                "state_code" => "AWD2",
                "nominal_hours" => "740",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS50815",
                "aqf_level" => "Diploma of",
                "title" => "Integrated Risk Management",
                "tga_status" => "Current",
                "state_code" => "AWC5",
                "nominal_hours" => "540",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS50915",
                "aqf_level" => "Diploma of",
                "title" => "Banking Services Management",
                "tga_status" => "Current",
                "state_code" => "AVX9",
                "nominal_hours" => "650",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS51015",
                "aqf_level" => "Diploma of",
                "title" => "Financial Markets",
                "tga_status" => "Current",
                "state_code" => "AWC2",
                "nominal_hours" => "450",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS51115",
                "aqf_level" => "Diploma of",
                "title" => "General Insurance",
                "tga_status" => "Current",
                "state_code" => "AWE4",
                "nominal_hours" => "670",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS51215",
                "aqf_level" => "Diploma of",
                "title" => "Insurance Broking",
                "tga_status" => "Current",
                "state_code" => "AWB4",
                "nominal_hours" => "520",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS51315",
                "aqf_level" => "Diploma of",
                "title" => "Life Insurance",
                "tga_status" => "Current",
                "state_code" => "AWB9",
                "nominal_hours" => "695",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS51415",
                "aqf_level" => "Diploma of",
                "title" => "Loss Adjusting",
                "tga_status" => "Current",
                "state_code" => "AWF7",
                "nominal_hours" => "870",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS51515",
                "aqf_level" => "Diploma of",
                "title" => "Credit Management",
                "tga_status" => "Current",
                "state_code" => "AWA8",
                "nominal_hours" => "505",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS51615",
                "aqf_level" => "Diploma of",
                "title" => "Securitisation",
                "tga_status" => "Current",
                "state_code" => "AWC9",
                "nominal_hours" => "565",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS51815",
                "aqf_level" => "Diploma of",
                "title" => "Financial Services",
                "tga_status" => "Current",
                "state_code" => "AWB7",
                "nominal_hours" => "550",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS60115",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Insurance Broking",
                "tga_status" => "Current",
                "state_code" => "AWE0",
                "nominal_hours" => "650",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS60215",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Accounting",
                "tga_status" => "Current",
                "state_code" => "AWD8",
                "nominal_hours" => "770",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS60415",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Financial Planning",
                "tga_status" => "Current",
                "state_code" => "AWD6",
                "nominal_hours" => "560",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS60515",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Superannuation",
                "tga_status" => "Current",
                "state_code" => "AWA9",
                "nominal_hours" => "710",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS60615",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Banking Services Management",
                "tga_status" => "Current",
                "state_code" => "AVZ9",
                "nominal_hours" => "710",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS60715",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Financial Licensing Management",
                "tga_status" => "Current",
                "state_code" => "AVY8",
                "nominal_hours" => "650",
                "type" => "Qualification"
            ],
            [
                "package_id" => "3",
                "national_code" => "FNS60815",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Integrated Risk Management",
                "tga_status" => "Current",
                "state_code" => "AVZ1",
                "nominal_hours" => "650",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT10115",
                "aqf_level" => "Certificate I in",
                "title" => "Information, Digital Media and Technology",
                "tga_status" => "Expired",
                "state_code" => "AVY6",
                "nominal_hours" => "160",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT20115",
                "aqf_level" => "Certificate II in",
                "title" => "Information, Digital Media and Technology",
                "tga_status" => "Expired",
                "state_code" => "AVZ2",
                "nominal_hours" => "370",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT30115",
                "aqf_level" => "Certificate III in",
                "title" => "Information, Digital Media and Technology",
                "tga_status" => "Expired",
                "state_code" => "AWB0",
                "nominal_hours" => "610",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40115",
                "aqf_level" => "Certificate IV in",
                "title" => "Information Technology",
                "tga_status" => "Expired",
                "state_code" => "AWB5",
                "nominal_hours" => "690",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40120",
                "aqf_level" => "Certificate IV in",
                "title" => "Information Technology",
                "tga_status" => "Current",
                "state_code" => "AC07",
                "nominal_hours" => "",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40215",
                "aqf_level" => "Certificate IV in",
                "title" => "Information Technology Support",
                "tga_status" => "Expired",
                "state_code" => "AVY7",
                "nominal_hours" => "705",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40315",
                "aqf_level" => "Certificate IV in",
                "title" => "Web-Based Technologies",
                "tga_status" => "Expired",
                "state_code" => "AWE7",
                "nominal_hours" => "705",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40415",
                "aqf_level" => "Certificate IV in",
                "title" => "Information Technology Networking",
                "tga_status" => "Expired",
                "state_code" => "AWG1",
                "nominal_hours" => "660",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40515",
                "aqf_level" => "Certificate IV in",
                "title" => "Programming",
                "tga_status" => "Expired",
                "state_code" => "AWF2",
                "nominal_hours" => "805",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40615",
                "aqf_level" => "Certificate IV in",
                "title" => "Information Technology Testing",
                "tga_status" => "Expired",
                "state_code" => "AWG2",
                "nominal_hours" => "695",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40715",
                "aqf_level" => "Certificate IV in",
                "title" => "Systems Analysis and Design",
                "tga_status" => "Expired",
                "state_code" => "AWD1",
                "nominal_hours" => "730",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40815",
                "aqf_level" => "Certificate IV in",
                "title" => "Digital Media Technologies",
                "tga_status" => "Expired",
                "state_code" => "AVZ6",
                "nominal_hours" => "700",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT40915",
                "aqf_level" => "Certificate IV in",
                "title" => "Digital and Interactive Games",
                "tga_status" => "Expired",
                "state_code" => "AWE5",
                "nominal_hours" => "730",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT41015",
                "aqf_level" => "Certificate IV in",
                "title" => "Computer Systems Technology",
                "tga_status" => "Expired",
                "state_code" => "AVZ7",
                "nominal_hours" => "810",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50115",
                "aqf_level" => "Diploma of",
                "title" => "Information Technology",
                "tga_status" => "Expired",
                "state_code" => "AWF1",
                "nominal_hours" => "610",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50215",
                "aqf_level" => "Diploma of",
                "title" => "Digital and Interactive Games",
                "tga_status" => "Expired",
                "state_code" => "AVZ4",
                "nominal_hours" => "700",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50315",
                "aqf_level" => "Diploma of",
                "title" => "Information Technology Systems Administration",
                "tga_status" => "Current",
                "state_code" => "AWE2",
                "nominal_hours" => "575",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50415",
                "aqf_level" => "Diploma of",
                "title" => "Information Technology Networking",
                "tga_status" => "Current",
                "state_code" => "AWD7",
                "nominal_hours" => "715",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50515",
                "aqf_level" => "Diploma of",
                "title" => "Database Design and Development",
                "tga_status" => "Current",
                "state_code" => "AWA1",
                "nominal_hours" => "685",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50615",
                "aqf_level" => "Diploma of",
                "title" => "Website Development",
                "tga_status" => "Current",
                "state_code" => "AWE3",
                "nominal_hours" => "810",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50715",
                "aqf_level" => "Diploma of",
                "title" => "Software Development",
                "tga_status" => "Current",
                "state_code" => "AWE6",
                "nominal_hours" => "655",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50815",
                "aqf_level" => "Diploma of",
                "title" => "Systems Analysis and Design",
                "tga_status" => "Current",
                "state_code" => "AVX8",
                "nominal_hours" => "645",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT50915",
                "aqf_level" => "Diploma of",
                "title" => "Digital Media Technologies",
                "tga_status" => "Current",
                "state_code" => "AWD9",
                "nominal_hours" => "850",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT60115",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Information Technology",
                "tga_status" => "Current",
                "state_code" => "AWA0",
                "nominal_hours" => "580",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT60215",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Network Security",
                "tga_status" => "Current",
                "state_code" => "AVX6",
                "nominal_hours" => "555",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT60315",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Information Technology Business Analysis",
                "tga_status" => "Current",
                "state_code" => "AWA6",
                "nominal_hours" => "635",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT60415",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Information Technology Project Management",
                "tga_status" => "Current",
                "state_code" => "AWE1",
                "nominal_hours" => "650",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT60515",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Computer Systems Technology",
                "tga_status" => "Current",
                "state_code" => "AWA2",
                "nominal_hours" => "1105",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT80115",
                "aqf_level" => "Graduate Certificate In",
                "title" => "Information Technology and Strategic Management",
                "tga_status" => "Current",
                "state_code" => "AWB8",
                "nominal_hours" => "320",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT80215",
                "aqf_level" => "Graduate Certificate In",
                "title" => "Information Technology Sustainability",
                "tga_status" => "Current",
                "state_code" => "AWD4",
                "nominal_hours" => "280",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT80315",
                "aqf_level" => "Graduate Certificate In",
                "title" => "Telecommunications",
                "tga_status" => "Current",
                "state_code" => "AVY1",
                "nominal_hours" => "225",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT80415",
                "aqf_level" => "Graduate Diploma of",
                "title" => "Telecommunications Network Engineering",
                "tga_status" => "Current",
                "state_code" => "AWE9",
                "nominal_hours" => "490",
                "type" => "Qualification"
            ],
            [
                "package_id" => "4",
                "national_code" => "ICT80515",
                "aqf_level" => "Graduate Diploma of",
                "title" => "Telecommunications and Strategic Management",
                "tga_status" => "Current",
                "state_code" => "AWF8",
                "nominal_hours" => "525",
                "type" => "Qualification"
            ]
        ];

        /* Example SeedData
        [
            "package_id" => "1",
            "national_code" => "BSB10115",
            "aqf_level" => "Certificate I in",
            "title" => "Business",
            "tga_status" => "Current",
            "state_code" => "AVU7",
            "nominal_hours" => "150",
            "type" => "Qualification"
        ],*/
        $numRecords = count($seedData);
        $this->command->getOutput()->progressStart($numRecords);

        foreach ($seedData as $newCourse) {
            Course::create($newCourse);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
