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

class AllOfException extends GroupedValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NONE => 'Все необходимые правила должны быть выполнены для поля {{name}}',
            self::SOME => 'Эти правила должны быть выполнены для поля {{name}}',
        ],
        self::MODE_NEGATIVE => [
            self::NONE => 'Никакие из этих правил не должны выполняться для поля {{name}}',
            self::SOME => 'Эти правила не должны выполняться для поля {{name}}',
        ],
    ];
}
