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

final class IdentityCard extends AbstractLocaleWrapper
{
    /**
     * {@inheritdoc}
     */
    protected function getSuffix(): string
    {
        $shortName = ucfirst(strtolower($countryCode)).'IdentityCard';
        $className = __NAMESPACE__.'\\Locale\\'.$shortName;
        if (!class_exists($className)) {
            throw new ComponentException(sprintf('Нет поддержки для удостоверения личности "%s"', $countryCode));
        }

        $this->countryCode = $countryCode;
        $this->validatable = new $className();
    }
}
