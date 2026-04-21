<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conta_id')
                  ->constrained('contas')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            // NULL = anexo pertence à conta inteira; preenchido = pertence a uma parcela específica
            $table->foreignId('parcela_id')
                  ->nullable()
                  ->constrained('parcelas')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->string('nome_arquivo', 255);           // Nome gerado no disco/storage
            $table->string('nome_original', 255);          // Nome enviado pelo usuário
            $table->string('tipo_mime', 100);              // application/pdf, image/jpeg...
            $table->unsignedBigInteger('tamanho_bytes');
            $table->string('caminho', 500);                // Caminho relativo no storage
            $table->timestamp('criado_em')->useCurrent();

            $table->index('conta_id');
            $table->index('parcela_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anexos');
    }
};
