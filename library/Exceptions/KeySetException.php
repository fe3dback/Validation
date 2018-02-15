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

class KeySetException extends GroupedValidationException
{
    const STRUCTURE = 2;

    /**
     * @var array
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NONE => 'Все необходимые правила должны быть выполнены для поля {{name}}',
            self::SOME => 'Эти правила должны быть выполнены для поля {{name}}',
            self::STRUCTURE => 'Должны присутствовать ключи {{keys}}',
        ],
        self::MODE_NEGATIVE => [
            self::NONE => 'Никакие из этих правил не должны выполняться для поля {{name}}',
            self::SOME => 'Эти правила не должны выполняться для поля {{name}}',
            self::STRUCTURE => 'Не должны присутствовать ключи {{keys}}',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function chooseTemplate()
    {
        if ($this->getParam('keys')) {
            return static::STRUCTURE;
        }

        return parent::chooseTemplate();
    }
}
