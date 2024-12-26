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
        Schema::create('ir_employees', function (Blueprint $table) {
            $table->id();
            $table->string('code_employee');
            $table->string('lastname_employee');
            $table->string('firstname_employee');
            $table->string('tel_employee');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('fonction_employee');
            $table->string('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('ir_services')->onDelete('cascade');
            $table->foreign('fonction_employee')->references('id')->on('ir_function_occupied')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_employees');
    }
};
