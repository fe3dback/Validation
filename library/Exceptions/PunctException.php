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

class PunctException extends AlphaException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно содержать только знаки пунктуации',
            self::EXTRA => 'Поле {{name}} должно содержать только знаки пунктуации и "{{additionalChars}}"',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно содержать знаки пунктуации',
            self::EXTRA => 'Поле {{name}} не должно содержать знаки пунктуации или "{{additionalChars}}"',
        ],
    ];
}
