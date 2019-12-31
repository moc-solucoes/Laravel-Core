<?php

namespace MOCSolutions\Core\Enums;

class Sexo extends Enum
{
    const Masculino = 0;
    const Feminino = 1;

    protected static $labels = [
        self::Masculino => 'Masculino',
        self::Feminino => 'Feminino'
    ];
}
