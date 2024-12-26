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
        Schema::create('ir_service_activity', function (Blueprint $table) {
            $table->id();
            $table->string('title_service_activity');
            $table->text('description_service_activity');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('ir_services')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_service_activity');
    }
};
