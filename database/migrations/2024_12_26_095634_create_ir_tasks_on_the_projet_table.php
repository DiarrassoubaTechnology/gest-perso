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
        Schema::create('ir_tasks_on_the_projet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_on_the_project_id');
            $table->string('title_tasks');
            $table->text('description_tasks')->nullable();
            $table->text('commentaire_tasks')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('team_on_the_project_id')->references('id')->on('ir_team_on_the_project')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statut')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_tasks_on_the_projet');
    }
};
