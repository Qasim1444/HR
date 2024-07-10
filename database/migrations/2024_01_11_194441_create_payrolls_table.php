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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();

            $table->string('number_of_day_work');
            $table->string('bonus');
            $table->string('overtime');
            $table->string('gross_salary');
            $table->string('cash_advance');
            $table->string('late_hours');
            $table->string('absent_days');
            $table->string('sss_contribution');
            $table->string('philhealth');
            $table->string('total_deductions');
            $table->string('netpay');
            $table->string('payroll_monthly');


            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
