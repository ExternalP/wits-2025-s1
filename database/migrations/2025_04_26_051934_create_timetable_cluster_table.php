<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timetable_cluster', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timetable_id');
            $table->unsignedBigInteger('cluster_id');
            $table->timestamps();

            $table->foreign('timetable_id')->references('id')->on('timetables')->onDelete('cascade');
            $table->foreign('cluster_id')->references('id')->on('clusters')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timetable_cluster');
    }
};
