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
       Schema::create('property_amenities', function (Blueprint $table) {
    $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
    $table->foreignId('amenity_id')->constrained('amenities')->cascadeOnDelete();
    $table->primary(['property_id', 'amenity_id']); // composite primary key preserved
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenities');
    }
};
