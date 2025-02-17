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
        Schema::create('jobhistories', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('job_id');
            $table->string('department_id');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobhistories');
    }
};
