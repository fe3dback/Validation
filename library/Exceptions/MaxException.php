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

class MaxException extends ValidationException
{
    const INCLUSIVE = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно быть меньше {{interval}}',
            self::INCLUSIVE => 'Поле {{name}} должно быть меньше либо равно {{interval}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно быть меньше {{interval}}',
            self::INCLUSIVE => 'Поле {{name}} не должно быть меньше либо равно {{interval}}',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->getParam('inclusive') ? static::INCLUSIVE : static::STANDARD;
    }
}
