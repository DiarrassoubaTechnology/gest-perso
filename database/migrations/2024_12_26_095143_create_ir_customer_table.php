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
        Schema::create('ir_customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prospects_id');
            $table->string('customer_name_manager');
            $table->string('customer_tel_manager', 20);
            $table->string('customer_email_manager')->nullable();         
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
        Schema::dropIfExists('ir_customer');
    }
};
