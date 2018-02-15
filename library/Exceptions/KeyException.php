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

class KeyException extends AttributeException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NOT_PRESENT => 'Ключ {{name}} должен присутствовать',
            self::INVALID => 'Ключ {{name}} должен быть валидным',
        ],
        self::MODE_NEGATIVE => [
            self::NOT_PRESENT => 'Ключ {{name}} не должен присутствовать',
            self::INVALID => 'Ключ {{name}} не должен быть валидным',
        ],
    ];
}
