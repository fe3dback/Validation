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

class AttributeException extends NestedValidationException
{
    const NOT_PRESENT = 0;
    const INVALID = 1;
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NOT_PRESENT => 'Свойство {{name}} должно быть указано',
            self::INVALID => 'Свойство {{name}} должно быть корректным',
        ],
        self::MODE_NEGATIVE => [
            self::NOT_PRESENT => 'Свойство {{name}} не должно быть указано',
            self::INVALID => 'Свойство {{name}} не должно быть корректным',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->getParam('hasReference') ? static::INVALID : static::NOT_PRESENT;
    }
}
