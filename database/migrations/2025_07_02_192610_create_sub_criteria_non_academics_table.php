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
        Schema::create('sub_criteria_non_academics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criteria_code_id')->constrained('criteria_codes')->onDelete('cascade');
            $table->string('sub_criteria_name');
            // $table->float('sub_criteria_value')->default(0);
             $table->decimal('sub_criteria_value', 5, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_criteria_non_academics');
    }
};
