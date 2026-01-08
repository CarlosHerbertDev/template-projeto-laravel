<?php

namespace Database\Factories;

use App\Enums\StatusUsuarios;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'senha' => Hash::make('password'), // senha padrão: password
            'telefone' => $this->faker->optional(0.7)->phoneNumber(),
            'foto_perfil' => $this->faker->optional(0.5)->randomElement(['avatar1.jpg', 'avatar2.png', 'avatar3.jpeg', 'avatar4.webp']),
            'status' => $this->faker->randomElement([
                StatusUsuarios::ATIVO->name,
                StatusUsuarios::INATIVO->name,
            ]),
        ];
    }

    /**
     * Estado para usuário ativo
     */
    public function ativo(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => StatusUsuarios::ATIVO->name,
        ]);
    }

    /**
     * Estado para usuário inativo
     */
    public function inativo(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => StatusUsuarios::INATIVO->name,
        ]);
    }

}
