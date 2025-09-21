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
        Schema::create('business_activity_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_activity_id')->constrained('business_activities')->onDelete('cascade');
            $table->string('label');
            $table->string('type');
            $table->string('is_required');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_activity_requirements');
    }
};
