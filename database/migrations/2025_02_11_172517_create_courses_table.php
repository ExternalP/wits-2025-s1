<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * EXAMPLE Courses from "Course 2.csv"
         * National Code,   AQF Level,          Title,  TGA Status, State Code, Nominal Hours,  Type,           QA,     StateCode,  NatCode,    NatTitle,   NatCodeAndTitle
         * CUA40715,        Certificate IV in,  Design, Current,    AZN5,       665,            Qualification,  AZN5,   AZN5,       CUA40715,   Design,     CUA40715 Certificate IV in Design
         * CUA40113,Certificate IV in,Dance,Current,J697,690,Qualification,J697,J697,CUA40113,Dance,CUA40113 Certificate IV in Dance
         */
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('national_code');
            $table->string('aqf_level');
            $table->string('title');
            $table->string('tga_status')->default('Current');
            // state_code should be unique excluding courses where tga_status == 'Expired'
            $table->string('state_code');
            $table->integer('nominal_hours');
            $table->string('type');
            $table->timestamps();
            $table->foreignId('package_id')->constrained('packages');

            // Adrian said to ignore the duplicate fields.
            //$table->string('qa'); // Same as state_code & statecode
            //$table->string('statecode'); // Same as state_code & QA
            //$table->string('natcode'); // Same as national_code
            //$table->string('nattitle'); // Same as title
            //$table->string('NatCodeAndTitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
