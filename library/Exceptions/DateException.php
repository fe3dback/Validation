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
 * @author Bruno Luiz da Silva <contato@brunoluiz.net>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class DateException extends ValidationException
{
    /**
     * {@inheritdoc}
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно быть валидной датой',
            self::FORMAT => 'Поле {{name}} должно быть валидной датой. Пример формата: {{format}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно быть валидной датой',
            self::FORMAT => 'Поле {{name}} не должно быть валидной датой в формате {{format}}',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function configure($name, array $params = [])
    {
        $params['sample'] = date(
            $params['format'],
            strtotime('2005-12-30')
        );

        return parent::configure($name, $params);
    }
}
