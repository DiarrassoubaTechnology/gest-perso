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
        Schema::create('ir_projects', function (Blueprint $table) {
            $table->id();
            $table->string('code_project');
            $table->string('libelle_project');
            $table->text('description_project');
            $table->unsignedBigInteger('employe_id');
            $table->date('start_date_project');
            $table->date('delivery_date_project')->nullable();
            $table->unsignedBigInteger('fonction_employee');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('ir_employees')->onDelete('cascade');
            $table->foreign('fonction_employee')->references('id')->on('ir_function_occupied')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_projects');
    }
};
