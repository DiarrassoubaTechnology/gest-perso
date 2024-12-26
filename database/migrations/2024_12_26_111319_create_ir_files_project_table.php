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
        Schema::create('ir_files_project', function (Blueprint $table) {
            $table->id();
            $table->string('files_project');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('ir_projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_files_project');
    }
};
