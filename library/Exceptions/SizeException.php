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

/**
 * Exception class for Size rule.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class SizeException extends BetweenException
{
    /**
     * @var array
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::BOTH => 'Поле {{name}} должно быть между {{minSize}} и {{maxSize}}',
            self::LOWER => 'Поле {{name}} должно быть больше {{minSize}}',
            self::GREATER => 'Поле {{name}} должно быть меньше {{maxSize}}',
        ],
        self::MODE_NEGATIVE => [
            self::BOTH => 'Поле {{name}} не должно быть между {{minSize}} и {{maxSize}}',
            self::LOWER => 'Поле {{name}} не должно быть больше {{minSize}}',
            self::GREATER => 'Поле {{name}} не должно быть меньше {{maxSize}}',
        ],
    ];
}
