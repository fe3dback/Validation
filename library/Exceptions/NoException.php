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

class NoException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} не считается "Нет" ("No")',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} считается "Нет" ("No")',
        ],
    ];
}
