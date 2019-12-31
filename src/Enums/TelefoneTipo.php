<?php

namespace MOCSolutions\Core\Enums;

class TelefoneTipo extends Enum
{
    const Residencial = 1;
    const Celular = 2;

    protected static $labels = [
        self::Residencial => 'Residêncial',
        self::Celular => 'Celular',
    ];
}
