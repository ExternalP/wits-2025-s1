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
            $table->string('national_code');//->unique(); // Same as NatCode
            $table->string('aqf_level');
            $table->string('title'); // Same as NatTitle
            $table->string('tga_status')->default('current');
            $table->string('state_code');//->unique(); // There are 2 State Codes & same as QA
            $table->integer('nominal_hours');
            $table->string('type');
            // TODO: Ask Adrian what to do about repeated/unnecessary fields in CSV file.
            //$table->string('qa');
            //$table->string('statecode');
            //$table->string('natcode');
            //$table->string('nattitle');
            //$table->string('NatCodeAndTitle');
            $table->timestamps();
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
