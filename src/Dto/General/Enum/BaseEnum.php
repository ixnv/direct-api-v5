<?php

namespace eLama\DirectApiV5\Dto\General\Enum;

use InvalidArgumentException;
use ReflectionClass;

class BaseEnum
{
    public static function values()
    {
        $reflection = new ReflectionClass(get_called_class());
        $constants = $reflection->getConstants();

        $filteredConstants = [];
        foreach ($constants as $name => $value) {
            if (strpos($name, '__') !== 0 ) {
                $filteredConstants[] = $value;
            }
        }

        return $filteredConstants;
    }

    public static function inEnum($value)
    {
        return in_array($value, static::values(), true);
    }

    /**
     * @param string $value
     * @throws InvalidArgumentException
     */
    public static function throwExceptionIfNotInEnum($value)
    {
        if (!static::inEnum($value)) {
            throw new InvalidArgumentException(
                'Запрашиваемой константы не существует: ' . $value
            );
        }
    }
}
