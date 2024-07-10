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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('hire_date')->nullable();
            $table->string('job_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('commission_pct')->nullable();
            $table->string('manager_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('role')->nullable();
            $table->string('is_delete')->default(0)->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable()->nullable();
            $table->string('password')->nullable();
            $table->string('location_id')->nullable();;
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
