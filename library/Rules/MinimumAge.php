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

namespace Respect\Validation\Rules;

use DateTimeImmutable;
use DateTimeInterface;
use Respect\Validation\Exceptions\ComponentException;

class MinimumAge extends AbstractRule
{
    public $age = null;
    public $format = null;

    public function __construct($age, $format = null)
    {
        if (!filter_var($age, FILTER_VALIDATE_INT)) {
            throw new ComponentException('Возраст должен быть целым числом.');
        }

        $this->age = $age;
        $this->format = $format;
    }

    public function validate($input): bool
    {
        if ($input instanceof DateTimeInterface) {
            $birthday = new DateTimeImmutable('now - '.$this->age.' year');

            return $birthday > $input;
        }

        if (!is_string($input) || (is_null($this->format) && false === strtotime($input))) {
            return false;
        }

        $age = ((date('Ymd') - date('Ymd', (int) strtotime($input))) / 10000);

        return $age >= $this->age;
    }
}
