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

class KeyNestedException extends AttributeException implements NonOmissibleExceptionInterface
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NOT_PRESENT => 'Не было найдено ни одного элемента для цепочки ключей {{name}}',
            self::INVALID => 'Цепочка ключей {{name}} не является валидной',
        ],
        self::MODE_NEGATIVE => [
            self::NOT_PRESENT => 'Элементы для цепочки ключей {{name}} не должны присутствовать',
            self::INVALID => 'Цепочка ключей {{name}} не должна быть валидной',
        ],
    ];
}
