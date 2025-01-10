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
        Schema::create('ir_time_work', function (Blueprint $table) {
            $table->id();
            $table->date('day_of_date');
            $table->unsignedBigInteger('employe_id');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('ir_employees')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_time_work');
    }
};
