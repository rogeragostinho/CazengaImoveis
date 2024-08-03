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
        Schema::create('calendario_visitas', function (Blueprint $table) {
            $table->id();
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->enum('status',['disponivel','agendado','cancelado'])->default('disponivel');
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendario_visitas');
    }
};
