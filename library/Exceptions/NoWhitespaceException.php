<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Respect\Validation\Exceptions;

class NoWhitespaceException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} не должно содержать пробелы и неотображаемые символы',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} должно содержать пробелы и/или неотображаемые символы',
        ],
    ];
}
