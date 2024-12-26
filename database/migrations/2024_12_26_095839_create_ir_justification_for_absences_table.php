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
        Schema::create('ir_justification_for_absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('absence_id');
            $table->text('description_justification')->nullable();
            $table->string('file_justification');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('absence_id')->references('id')->on('ir_absence_hours')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_justification_for_absences');
    }
};
