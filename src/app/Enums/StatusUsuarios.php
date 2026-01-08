<?php


namespace App\Enums;

enum StatusUsuarios: string
{

    case ATIVO = 'ATIVO';
    case INATIVO = 'INATIVO';

    /**
     * Human readable label for UI/logs.
     */
    public function label(): string
    {
        return match ($this) {
            self::ATIVO => 'Ativo',
            self::INATIVO => 'Inativo',
        };
    }
}
      