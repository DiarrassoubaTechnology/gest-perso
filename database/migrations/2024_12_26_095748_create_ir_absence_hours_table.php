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
        Schema::create('ir_absence_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employees_id');
            $table->date('start_date_absence_hours');
            $table->date('end_date_absence_hours');
            $table->integer('sum_day_absence_hours');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('employees_id')->references('id')->on('ir_employees')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_absence_hours');
    }
};
