<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migration to create Pivot table for courses & units.
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_unit', function (Blueprint $table) {
            $table->foreignId('course_id')->constrained('courses');//->cascadeOnDelete();
            $table->foreignId('unit_id')->constrained('units');//->cascadeOnDelete();
            $table->primary(['course_id', 'unit_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_unit');
    }
};
