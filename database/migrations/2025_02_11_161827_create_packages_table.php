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
         * EXAMPLE Packages from "Package 2.csv"
         * National Code,   Title,  TGA Status
         * BSB,Business Services Training Package,Current
         * CUA,Creative Arts and Culture Training Package,Current
         */
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            //$table->char('national_code', 3)->unique();
            $table->string('national_code');
            $table->string('title');
            $table->string('tga_status')->default('Current');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
