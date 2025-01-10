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
        Schema::create('ir_work_clock', function (Blueprint $table) {
            $table->id();
            $table->time('start_work_clock');
            $table->time('end_work_clock');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_work_clock');
    }
};
