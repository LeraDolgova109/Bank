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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('rate');
            $table->dateTime('start_date')->default(\Carbon\Carbon::now()->format('Y-m-d'));
            $table->dateTime('end_date')->default(\Carbon\Carbon::now()->addYear()->format('Y-m-d'));
            $table->enum('status', ['available', 'unavailable'])->default('unavailable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
