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

class NoneOfException extends NestedValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Никакие из этих правил не должны выполняться для поля {{name}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Все эти правила должны выполняться для поля {{name}}',
        ],
    ];
}
