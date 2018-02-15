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

class AtLeastException extends GroupedValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NONE => 'Как минимум {{howMany}} из {{failed}} необходимых правил должны выполняться для поля {{name}}',
            self::SOME => 'Как минимум {{howMany}} из {{failed}} необходимых правил должны выполняться для поля {{name}}, только {{passed}} выполнены.',
        ],
        self::MODE_NEGATIVE => [
            self::NONE => 'Как минимум {{howMany}} из {{failed}} необходимых правил не должны выполняться для поля {{name}}',
            self::SOME => 'Как минимум {{howMany}} из {{failed}} необходимых правил не должны выполняться для поля {{name}}, только {{passed}} выполнены.',
        ],
    ];
}
