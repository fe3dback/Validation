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

class KeyValueException extends ValidationException
{
    const COMPONENT = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Ключ {{name}} должен присутствовать',
            self::COMPONENT => 'Ключ {{baseKey}} должен быть валидным для сопоставления и валидации {{comparedKey}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Ключ {{name}} не должен присутствовать',
            self::COMPONENT => 'Ключ {{baseKey}} не должен быть валидным для сопоставления и валидации {{comparedKey}}',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->getParam('component') ? static::COMPONENT : static::STANDARD;
    }
}
