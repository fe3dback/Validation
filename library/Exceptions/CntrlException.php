<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Respect\Validation\Exceptions;

class CntrlException extends AlphaException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно содержать только управляющие символы',
            self::EXTRA => 'Поле {{name}} должно содержать только управляющие символы и "{{additionalChars}}"',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно содержать управляющие символы',
            self::EXTRA => 'Поле {{name}} не должно содержать управляющие символы или "{{additionalChars}}"',
        ],
    ];
}
