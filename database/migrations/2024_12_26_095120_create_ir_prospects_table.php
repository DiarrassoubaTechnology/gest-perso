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
        Schema::create('ir_prospects', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_structure');
            $table->string('prospects_location');
            $table->string('prospects_tel', 20);
            $table->string('prospects_email')->nullable();
            $table->unsignedBigInteger('field_of_activities');
            $table->enum('statut', ['prospect', 'client'])->default('prospect');  // Statut, avec les options 'prospect' ou 'client'
            $table->timestamps();
            $table->foreign('field_of_activities')->references('id')->on('ir_activity')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_prospects');
    }
};
