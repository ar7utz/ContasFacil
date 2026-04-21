<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conta_id')
                  ->constrained('contas')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            // NULL = notificação da conta inteira; preenchido = notif. de uma parcela específica
            $table->foreignId('parcela_id')
                  ->nullable()
                  ->constrained('parcelas')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->enum('tipo', ['email', 'push', 'in-app'])
                  ->default('in-app');

            $table->unsignedTinyInteger('dias_antes')->default(3); // 1, 3 ou 7 dias antes
            $table->timestamp('enviado_em')->nullable();            // NULL = ainda não enviado
            $table->timestamp('criado_em')->useCurrent();

            $table->index('conta_id');
            $table->index('parcela_id');
            $table->index('enviado_em');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notificacoes');
    }
};
