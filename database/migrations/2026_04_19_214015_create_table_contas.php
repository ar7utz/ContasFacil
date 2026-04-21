<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')
                  ->nullable()
                  ->constrained('categorias')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();

            $table->string('titulo', 200);
            $table->text('descricao')->nullable();
            $table->decimal('valor_total', 10, 2);
            $table->date('data_vencimento');

            $table->enum('recorrencia', ['nenhuma', 'semanal', 'mensal', 'anual'])
                  ->default('nenhuma');

            $table->enum('status', ['pendente', 'pago', 'atrasado', 'cancelado'])
                  ->default('pendente');

            // Preenchido ao confirmar pagamento
            $table->enum('tipo_pagamento', [
                'debito', 'credito', 'pix', 'dinheiro', 'boleto', 'transferencia',
            ])->nullable();

            $table->unsignedTinyInteger('total_parcelas')->default(1); // 1 = sem parcelamento
            $table->text('observacoes')->nullable();
            $table->timestamps();

            $table->index('data_vencimento');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contas');
    }
};
