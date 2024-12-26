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
        Schema::create('ir_team_for_appointment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->unsignedBigInteger('employees_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('appointment_id')->references('id')->on('ir_appointment')->onDelete('cascade');
            $table->foreign('employees_id')->references('id')->on('ir_employees')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_team_for_appointment');
    }
};
