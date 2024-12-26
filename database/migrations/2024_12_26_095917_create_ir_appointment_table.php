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
        Schema::create('ir_appointment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prospects_id');
            $table->string('location_appointment');
            $table->text('description_appointment')->nullable();
            $table->string('hour_appointment');
            $table->date('date_appointment');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('prospects_id')->references('id')->on('ir_prospects')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_appointment');
    }
};
