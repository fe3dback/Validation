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

class VideoUrlException extends ValidationException
{
    const SERVICE = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно быть валидной видео-гиперссылкой (video URL)',
            self::SERVICE => 'Поле {{name}} должно быть валидной {{service}} видео-гиперссылкой (video URL)',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно быть валидной видео-гиперссылкой (video URL)',
            self::SERVICE => 'Поле {{name}} не должно быть валидной {{service}} видео-гиперссылкой (video URL)',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function chooseTemplate()
    {
        if (false !== $this->getParam('service')) {
            return self::SERVICE;
        }

        return static::STANDARD;
    }
}
