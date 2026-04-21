<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Moradia',       'cor' => '#6366F1', 'icone' => 'home'],
            ['nome' => 'Alimentação',   'cor' => '#F59E0B', 'icone' => 'shopping-cart'],
            ['nome' => 'Transporte',    'cor' => '#10B981', 'icone' => 'car'],
            ['nome' => 'Saúde',         'cor' => '#EF4444', 'icone' => 'heart'],
            ['nome' => 'Educação',      'cor' => '#3B82F6', 'icone' => 'book-open'],
            ['nome' => 'Lazer',         'cor' => '#8B5CF6', 'icone' => 'smile'],
            ['nome' => 'Vestuário',     'cor' => '#EC4899', 'icone' => 'tag'],
            ['nome' => 'Serviços',      'cor' => '#14B8A6', 'icone' => 'tool'],
            ['nome' => 'Impostos',      'cor' => '#F97316', 'icone' => 'file-text'],
            ['nome' => 'Outros',        'cor' => '#6B7280', 'icone' => 'more-horizontal'],
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insertOrIgnore([
                ...$categoria,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
