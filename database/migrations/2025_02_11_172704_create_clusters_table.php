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
         * EXAMPLE Clusters from "Cluster 2.csv"
         * Code,Title,Qualification,Qualification State Code,Unit1,Unit2,Unit3,Unit4,Unit5,Unit6,Unit7,Unit8
         * ADVPROG,Advanced Programming,ICT50220,AC21,ICTPRG535,ICTPRG547,,,,,,
         * BIGDAT,Big Data,ICT50220,AC21,ICTDAT503,ICTDAT501,BSBDAT501,ICTDAT503,,,,
         */
        Schema::create('clusters', function (Blueprint $table) {
            $table->id();
            $table->string('code');//->unique();
            $table->string('title');
            $table->string('qualification');
            $table->string('state_code');//->unique();
            $table->string('unit1')->nullable();
            $table->string('unit2')->nullable();
            $table->string('unit3')->nullable();
            $table->string('unit4')->nullable();
            $table->string('unit5')->nullable();
            $table->string('unit6')->nullable();
            $table->string('unit7')->nullable();
            $table->string('unit8')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clusters');
    }
};
