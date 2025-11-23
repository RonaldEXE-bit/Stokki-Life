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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('produto_id');
            $table->string('tipo_venda'); // Produto Fechado ou Por Copo
            $table->integer('quantidade')->default(0);
            $table->integer('copos')->default(0);
            $table->string('status_pagamento'); // Pago, Pendente, etc.
            $table->decimal('valor_pago', 10, 2)->default(0);
            $table->decimal('valor_total', 10, 2)->default(0); // <-- campo corrigido
            $table->dateTime('data_venda')->nullable();
            $table->timestamps();

            // Relacionamentos
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
