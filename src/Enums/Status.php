<?php

namespace MOCSolutions\Core\Enums;

class Status extends Enum
{
    const Inativo = 0;
    const Ativo = 1;

    protected static $labels = [
        self::Ativo => 'Ativo',
        self::Inativo => 'Inativo'
    ];
}
