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
        Schema::table('agents', function (Blueprint $table) {
            $table->enum('agent_type', [
                'agent',
                'rental_specialist',  // Focuses on rentals and leases
                'luxury_agent',       // Handles high-end and luxury properties
                'commercial_agent',   // Deals with office space, retail, and commercial properties
                'residential_agent',  // General home, villa, and apartment listings
                'land_specialist',    // Handles plots, farmland, and development land
                'new_construction',   // Represents new projects and developments
                'property_manager',    // Manages properties on behalf of owners
            ])->after('years_experience')->default('agent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agents', function (Blueprint $table) {
            //
        });
    }
};
