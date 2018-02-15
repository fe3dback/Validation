<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Respect\Validation\Rules\Locale;

use Respect\Validation\Exceptions\ComponentException;
use Respect\Validation\Validatable;

class Factory
{
    /**
     * @return Validatable
     */
    public function bic($countryCode)
    {
        $filteredCountryCode = strtoupper($countryCode);
        switch ($filteredCountryCode) {
            case 'DE':
                return new GermanBic();

            default:
                throw new ComponentException(
                    sprintf(
                        'Невозможно провести BIC-валидацию для страны "%s"',
                        $countryCode
                    )
                );
        }
    }

    /**
     * @return Validatable
     */
    public function bank($countryCode)
    {
        $filteredCountryCode = strtoupper($countryCode);
        switch ($filteredCountryCode) {
            case 'DE':
                return new GermanBank();

            default:
                throw new ComponentException(
                    sprintf(
                        'Невозможно провести валидацию банка для страны "%s"',
                        $countryCode
                    )
                );
        }
    }

    /**
     * @return Validatable
     */
    public function bankAccount($countryCode, $bank)
    {
        $filteredCountryCode = strtoupper($countryCode);
        switch ($filteredCountryCode) {
            case 'DE':
                return new GermanBankAccount($bank);

            default:
                throw new ComponentException(
                    sprintf(
                        'Невозможно провести валидацию банковского счёта для страны "%s" и банка "%s"',
                        $countryCode,
                        $bank
                    )
                );
        }
    }
}
