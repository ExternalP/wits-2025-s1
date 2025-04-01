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
         * EXAMPLE Units from "Unit 2.csv"
         * National Code,Title,TGA Status,State Code,Nominal Hours
         * BSBMKG402,Analyse consumer behaviour for specific markets,Replaced,AUJ44,50
         * BSBADM101,Use business equipment and resources,Current,AUJ55,20
         */
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('national_code');
            $table->string('title');
            $table->string('tga_status')->default('Current');
            $table->string('state_code');
            $table->integer('nominal_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
