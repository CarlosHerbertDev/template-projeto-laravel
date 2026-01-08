migration 


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusUsuarios;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome')->index();
            $table->string('email')->unique()->index();
            $table->string('senha');
            $table->string('telefone')->nullable();
            $table->string('foto_perfil')->nullable();
            $statusUsuarios = array_column(StatusUsuarios::cases(), 'name');
            $table->enum('status', $statusUsuarios)->default(StatusUsuarios::ATIVO->name)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
