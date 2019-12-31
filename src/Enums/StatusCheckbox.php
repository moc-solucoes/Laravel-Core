<?php

namespace MOCSolutions\Core\Enums;

class StatusCheckbox extends Enum
{
    const Ativo = 'on';
    const Inativo = '';

    protected static $labels = [
        self::Ativo => 'Ativo',
        self::Inativo => 'Inativo'
    ];
}
