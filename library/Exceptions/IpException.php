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

class IpException extends ValidationException
{
    const STANDARD = 0;
    const NETWORK_RANGE = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Поле {{name}} должно быть IP-адресом',
            self::NETWORK_RANGE => 'Поле {{name}} должно быть IP-адресом в {{range}} диапазоне',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Поле {{name}} не должно быть IP-адресом',
            self::NETWORK_RANGE => 'Поле {{name}} не должно быть IP-адресом в {{range}} диапазоне',
        ],
    ];

    public function configure($name, array $params = [])
    {
        if ($params['networkRange']) {
            $range = $params['networkRange'];
            $message = $range['min'];

            if (isset($range['max'])) {
                $message .= '-'.$range['max'];
            } else {
                $message .= '/'.long2ip((int) $range['mask']);
            }

            $params['range'] = $message;
        }

        return parent::configure($name, $params);
    }

    public function chooseTemplate()
    {
        if (!$this->getParam('networkRange')) {
            return static::STANDARD;
        }

        return static::NETWORK_RANGE;
    }
}
