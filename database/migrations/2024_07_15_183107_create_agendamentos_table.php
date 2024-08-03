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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            // INFORMAÇÕES CLIENTE
            $table->string('cliente_nome')->nullable();
            $table->string('cliente_telefone')->nullable();
            $table->string('cliente_email')->nullable();
            $table->string('cliente_morada')->nullable();
            // FOREIGN
            $table->unsignedBigInteger('imovel_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('imovel_id')->references('id')->on('imoveis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
