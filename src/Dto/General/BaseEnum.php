<?php

namespace eLama\DirectApiV5\Dto\General;

use InvalidArgumentException;
use ReflectionClass;

class BaseEnum
{
    /**
     * Метод возвращает все константы Enum'ов, кроме тех,
     * что начинаются с двойного подчеркивания.
     */
    public static function values()
    {
        $reflection = new ReflectionClass(get_called_class());
        $constants = $reflection->getConstants();

        $constants = array_filter(array_keys($constants), function($constantName) {
            return strpos($constantName, '__') === false;
        });

        return array_values($constants);
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
