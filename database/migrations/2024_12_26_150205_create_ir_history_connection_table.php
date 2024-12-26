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
        Schema::create('ir_history_connection', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employees_id');
            $table->ipAddress('ip_address');        // Adresse IP de l'utilisateur lors de la connexion
            $table->string('user_agent');           // User-agent (navigateur utilisé)
            $table->timestamp('connexion_time');    // Heure de la connexion
            $table->timestamp('deconnexion_time')->nullable(); // Heure de déconnexion (peut être null si l'utilisateur est encore connecté)
            $table->timestamps();
            $table->foreign('employees_id')->references('id')->on('ir_employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir_history_connection');
    }
};
