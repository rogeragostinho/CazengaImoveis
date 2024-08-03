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
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            //OUTRO
            $table->enum('status', ['pendente', 'ativo', 'vendido', 'alugado'])->default('pendente');
            // DADOS IMÓVEL
            $table->string('condicao')->nullable();
            $table->enum('contrato', ['venda', 'aluguel']);
            $table->string('tipo');
            $table->string('bairro');
            $table->string('rua');
            $table->string('n_casa')->nullable();
            $table->string('dimensao')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('n_quartos')->nullable();
            $table->double('preco');
            // DADOS DONO
            $table->string('dono_nome');
            $table->string('dono_telefone');
            $table->string('dono_whatsapp')->nullable();
            $table->string('dono_email')->nullable();
            $table->string('dono_morada')->nullable();
            // COMISSÕES
            $table->integer('comissao_imobiliaria')->nullable();
            $table->integer('comissao_corretor')->nullable();
            // FOREIGN
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            //
            $table->timestamps();
        });

        Schema::create('usuarios_imoveis', function (Blueprint $table) {
            $table->id();
            //PARA LINKS DE INTERMEDIÁRIO
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_imovel');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_imovel')->references('id')->on('imoveis')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imoveis');
        Schema::dropIfExists('usuarios_imoveis');
    }
};
