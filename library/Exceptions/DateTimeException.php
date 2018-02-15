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

use function strtotime;

/**
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class DateTimeException extends ValidationException
{
    public const FORMAT = 1;

    /**
     * {@inheritdoc}
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно быть валидной датой/временем',
            self::FORMAT => 'Поле {{name}} должно быть валидной датой/временем в формате {{sample}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно быть валидной датой/временем',
            self::FORMAT => 'Поле {{name}} не должно быть валидной датой/временем в формате {{sample}}',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function configure($name, array $params = [])
    {
        $params['sample'] = date(
            (string) $params['format'],
            strtotime('2005-12-30 01:02:03')
        );

        return parent::configure($name, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function chooseTemplate()
    {
        return $this->getParam('format') ? static::FORMAT : static::STANDARD;
    }
}
