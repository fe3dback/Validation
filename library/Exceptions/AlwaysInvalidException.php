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

class AlwaysInvalidException extends ValidationException
{
    const SIMPLE = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} всегда невалидное',
            self::SIMPLE => 'Поле {{name}} невалидное',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} всегда валидное',
            self::SIMPLE => 'Поле {{name}} валидное',
        ],
    ];
}
