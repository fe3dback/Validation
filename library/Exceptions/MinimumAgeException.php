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

class MinimumAgeException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Возраст должен быть {{age}} лет или больше.',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Возраст не должен быть {{age}} лет или больше.',
        ],
    ];
}
