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

class AlphaException extends ValidationException
{
    const EXTRA = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно содержать только буквы (a-z)',
            self::EXTRA => 'Поле {{name}} должно содержать только буквы (a-z) и "{{additionalChars}}"',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно содержать буквы (a-z)',
            self::EXTRA => 'Поле {{name}} не должно содержать буквы (a-z) и "{{additionalChars}}"',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->getParam('additionalChars') ? static::EXTRA : static::STANDARD;
    }
}
