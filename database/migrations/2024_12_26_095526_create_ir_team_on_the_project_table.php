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
        Schema::create('ir_team_on_the_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('project_manager_id');
            $table->string('role_team_project');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('ir_employees')->onDelete('cascade');
            $table->foreign('project_manager_id')->references('id')->on('ir_project_manager')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_team_on_the_project');
    }
};
