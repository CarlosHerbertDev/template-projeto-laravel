<?php

namespace App\Models;

use App\Enums\StatusUsuarios;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'usuarios';


    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone',
        'foto_perfil',
        'status',
    ];

    
    protected $hidden = [
        'senha',
    ];

    
    protected function casts(): array
    {
        return [
            'status' => StatusUsuarios::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
