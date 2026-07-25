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
       Schema::create('properties', function (Blueprint $table) {
    $table->id();
    $table->foreignId('agent_id')
        ->constrained('users')
        ->cascadeOnDelete();
    $table->string('title');
     $table->string('slug', 200)->unique();
    $table->text('description')->nullable();
    $table->enum('purpose', ['sale', 'rent']);
    $table->enum('type', ['house', 'apartment', 'office', 'villa', 'land']);
    $table->foreignId('city_id')
        ->constrained('cities');            
    $table->decimal('price', 12, 2);
    $table->integer('area')->nullable();
    $table->unsignedTinyInteger('bedrooms')->default(0);
    $table->unsignedTinyInteger('bathrooms')->default(0); 
    $table->unsignedTinyInteger('garages')->default(0);
       $table->boolean('featured');
       $table->integer('floors');
       $table->year('year_built');

    $table->integer('views')->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
