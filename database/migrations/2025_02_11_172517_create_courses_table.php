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
         * National Code,   AQF Level,          Title,  TGA Status, State Code, Nominal Hours,  Type
         * CUA40715,        Certificate IV in,  Design, Current,    AZN5,       665,            Qualification
         * CUA40113,Certificate IV in,Dance,Current,J697,690,Qualification
         */
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('national_code');
            $table->string('aqf_level');
            $table->string('title');
            $table->string('tga_status')->default('Current');
            // state_code should be unique excluding courses where tga_status == 'Expired' or 'Replaced'
            $table->string('state_code');
            $table->integer('nominal_hours')->nullable();
            $table->string('type')->default('Qualification');
            $table->timestamps();
            $table->foreignId('package_id')->constrained('packages');

            // The combination of the columns must be unique not individual columns
            $table->unique(['national_code', 'aqf_level', 'title', 'tga_status', 'state_code']);
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
