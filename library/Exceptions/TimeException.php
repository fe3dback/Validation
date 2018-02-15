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

/**
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class TimeException extends ValidationException
{
    /**
     * {@inheritdoc}
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно быть корректным временем в формате {{sample}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно быть корректным временем в формате {{sample}}',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function configure($name, array $params = [])
    {
        $params['sample'] = date(
            $params['format'],
            strtotime('23:59:59')
        );

        return parent::configure($name, $params);
    }
}
