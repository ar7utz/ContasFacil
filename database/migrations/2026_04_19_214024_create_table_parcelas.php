<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conta_id')
                  ->constrained('contas')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->unsignedTinyInteger('numero_parcela');
            $table->decimal('valor', 10, 2);
            $table->date('data_vencimento');
            $table->timestamp('pago_em')->nullable();

            $table->enum('status', ['pendente', 'pago', 'atrasado'])
                  ->default('pendente');

            // Pode diferir do tipo de pagamento da conta pai
            $table->enum('tipo_pagamento', [
                'debito', 'credito', 'pix', 'dinheiro', 'boleto', 'transferencia',
            ])->nullable();

            $table->timestamps();

            $table->unique(['conta_id', 'numero_parcela']);
            $table->index('data_vencimento');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parcelas');
    }
};
