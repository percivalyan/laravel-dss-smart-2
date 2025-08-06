<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alternative_value_non_academics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_non_academic_id');
            $table->unsignedBigInteger('criteria_non_academic_id');
            $table->unsignedBigInteger('sub_criteria_non_academic_id');
            $table->timestamps();

            // Foreign Keys with shorter names
            $table->foreign('alternative_non_academic_id', 'fk_altval_nonacad')
                ->references('id')->on('alternative_non_academics')->onDelete('cascade');
            $table->foreign('criteria_non_academic_id', 'fk_crit_nonacad')
                ->references('id')->on('criteria_non_academics')->onDelete('cascade');
            $table->foreign('sub_criteria_non_academic_id', 'fk_subcrit_nonacad')
                ->references('id')->on('sub_criteria_non_academics')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alternative_value_non_academics');
    }
};
