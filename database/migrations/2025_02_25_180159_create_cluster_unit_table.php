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
        Schema::create('cluster_unit', function (Blueprint $table) {
            $table->foreignId('cluster_id')->constrained('clusters');//->cascadeOnDelete();
            $table->foreignId('unit_id')->constrained('units');//->cascadeOnDelete();
            $table->primary(['cluster_id', 'unit_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cluster_unit');
    }
};
