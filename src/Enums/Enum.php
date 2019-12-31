<?php

namespace MOCSolutions\Core\Enums;

use MOCSolutions\Core\Interfaces\Enums;

abstract class Enum implements Enums
{
    public static function GetLabel($value)
    {
        $label = @static::$labels[$value];

        return $label;
    }

    public static function All()
    {
        $label = static::$labels;

        return $label;
    }
}
