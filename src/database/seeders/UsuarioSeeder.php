<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Quantidade padrão caso não seja passado nada
        $num = $this->command->ask('Quantos usuários deseja criar?', 10);

        Usuario::factory()->count($num)->create();
    }
}
