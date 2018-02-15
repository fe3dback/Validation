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

class CreditCardException extends ValidationException
{
    const BRANDED = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно быть валидным номером кредитной карты',
            self::BRANDED => 'Поле {{name}} должно быть валидным номером кредитной карты {{brand}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно быть валидным номером кредитной карты',
            self::BRANDED => 'Поле {{name}} не должно быть валидным номером кредитной карты {{brand}}',
        ],
    ];

    public function chooseTemplate()
    {
        if (!$this->getParam('brand')) {
            return static::STANDARD;
        }

        return static::BRANDED;
    }
}
