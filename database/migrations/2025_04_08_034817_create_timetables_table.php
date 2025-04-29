<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('cluster_id');
            $table->date('start_date');
            $table->time('start_time');
            $table->integer('session_duration'); 
            $table->date('end_date')->nullable(); 
            $table->unsignedBigInteger('lecturer_id'); // user_id or just name
            $table->timestamps();

            // create a pivot table linking timetable with units and another pivot table linking time table clusters

            // Each foreign key 
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('cluster_id')->references('id')->on('clusters')->onDelete('cascade');
            $table->foreign('lecturer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
