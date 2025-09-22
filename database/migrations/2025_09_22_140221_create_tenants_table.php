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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('password'); // we will use email for tenant login
            $table->string('phone')->nullable();
            $table->boolean('is_active')->default(false);
            $table->foreignId('business_activity_id')->nullable()->constrained('business_activities')->onDelete('cascade');
            $table->string('main_language')->nullable();
            $table->string('sub_language')->nullable();
            $table->string('admin_main_language')->nullable();
            $table->string('admin_sub_language')->nullable();
            // $table->timestamp('expiration_date')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
