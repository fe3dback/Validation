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

class AgeException extends NestedValidationException
{
    const BOTH = 0;
    const LOWER = 1;
    const GREATER = 2;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::BOTH => 'Поле {{name}} должно быть между {{minAge}} и {{maxAge}} лет назад',
            self::LOWER => 'Поле {{name}} должно быть меньше {{minAge}} лет назад',
            self::GREATER => 'Поле {{name}} должно быть больше {{maxAge}} лет назад',
        ],
        self::MODE_NEGATIVE => [
            self::BOTH => 'Поле {{name}} не должно быть между {{minAge}} и {{maxAge}} лет назад',
            self::LOWER => 'Поле {{name}} не должно быть меньше {{minAge}} лет назад',
            self::GREATER => 'Поле {{name}} не должно быть больше {{maxAge}} лет назад',
        ],
    ];

    public function chooseTemplate()
    {
        if (!$this->getParam('minAge')) {
            return static::GREATER;
        }

        if (!$this->getParam('maxAge')) {
            return static::LOWER;
        }

        return static::BOTH;
    }
}
