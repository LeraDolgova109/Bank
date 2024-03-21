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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->unsignedBigInteger('rate_id')->nullable();
            $table->foreign('rate_id')->references('id')->on('rates')->nullOnDelete();
            $table->unsignedBigInteger('amount');
            $table->enum('status', ['approval', 'rejected', 'cancelled' ,'approved', 'issued', 'in_process', 'closed'])->default('approval');
            $table->dateTime('issue_date')->nullable();
            $table->dateTime('close_date')->nullable();
            $table->string('issuance_account')->nullable();
            $table->string('repayment_account')->nullable();
            $table->unsignedInteger('term');
            $table->unsignedBigInteger('min_payment')->nullable();
            $table->unsignedBigInteger('debt_amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
