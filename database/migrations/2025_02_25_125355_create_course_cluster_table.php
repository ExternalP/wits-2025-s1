<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migration to create Pivot table for courses & clusters.
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_cluster', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('course_id')->constrained('courses');//->cascadeOnDelete();
            $table->foreignId('cluster_id')->constrained('clusters');//->cascadeOnDelete();
            $table->primary(['course_id', 'cluster_id']);
            $table->timestamps();
            // TODO: (Check with Adrian first) Run line below to make a model for the pivot table
            // php artisan make:model CourseCluster --pivot
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_cluster');
    }
};
