<?php

namespace MOCSolutions\Core\Enums;

class EstadoCivil extends Enum
{
    const Solteiro = 1;
    const Casado = 2;
    const Separado = 3;
    const Divorciado = 4;
    const Viuvo = 5;
    const UniaoEstavel = 6;

    protected static $labels = [
        self::Solteiro => 'Solteiro',
        self::Casado => 'Casado',
        self::Separado => 'Separado',
        self::Divorciado => 'Divorciado',
        self::Viuvo => 'Viúvo',
        self::UniaoEstavel => 'União Estável'
    ];
}

