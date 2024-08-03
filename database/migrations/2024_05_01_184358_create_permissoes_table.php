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
       /* Schema::create('permissoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('tipo');
            $table->enum('ler',['sim', 'nao'])->default('nao');
            $table->enum('criar',['sim', 'nao'])->default('nao');
            $table->enum('excluir',['sim', 'nao'])->default('nao');
            $table->enum('atualizar',['sim', 'nao'])->default('nao');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissoes');
    }
};
