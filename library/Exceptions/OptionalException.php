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

class OptionalException extends ValidationException
{
    const STANDARD = 0;
    const NAMED = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Значение должно быть опционально',
            self::NAMED => 'Поле {{name}} должно быть опционально',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Значение не должно быть опционально',
            self::NAMED => 'Поле {{name}} не должно быть опционально',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->hasName() ? static::NAMED : static::STANDARD;
    }
}
