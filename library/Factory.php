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

namespace Respect\Validation;

use ReflectionClass;
use ReflectionObject;
use Respect\Validation\Exceptions\ComponentException;
use Respect\Validation\Exceptions\InvalidClassException;
use Respect\Validation\Exceptions\ValidationException;
use function array_map;
use function array_merge;
use function array_unique;
use function class_exists;
use function lcfirst;
use function Respect\Stringifier\stringify;

/**
 * Factory of objects.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class Factory
{
    private const DEFAULT_RULES_NAMESPACES = [
        'Respect\\Validation\\Rules',
        'Respect\\Validation\\Rules\\Locale',
    ];

    private const DEFAULT_EXCEPTIONS_NAMESPACES = [
        'Respect\\Validation\\Exceptions',
        'Respect\\Validation\\Exceptions\\Locale',
    ];

    /**
     * Default instance of the Factory.
     *
     * @var Factory
     */
    private static $defaultInstance;

    /**
     * @var string[]
     */
    private $rulesNamespaces = [];

    /**
     * @var string[]
     */
    private $exceptionsNamespaces = [];

    /**
     * Initializes the factory with the defined namespaces.
     *
     * If the default namespace is not in the array, it will be add to the end
     * of the array.
     *
     * @param string[] $rulesNamespaces
     * @param string[] $exceptionsNamespaces
     */
    public function __construct(array $rulesNamespaces, array $exceptionsNamespaces)
    {
        $this->rulesNamespaces = $this->filterNamespaces($rulesNamespaces, self::DEFAULT_RULES_NAMESPACES);
        $this->exceptionsNamespaces = $this->filterNamespaces($exceptionsNamespaces, self::DEFAULT_EXCEPTIONS_NAMESPACES);
    }

    /**
     * Define the default instance of the Factory.
     *
     * @param Factory $defaultInstance
     */
    public static function setDefaultInstance(self $defaultInstance): void
    {
        self::$defaultInstance = $defaultInstance;
    }

    /**
     * Returns the default instance of the Factory.
     *
     * @return Factory
     */
    public static function getDefaultInstance(): self
    {
        if (null === self::$defaultInstance) {
            self::$defaultInstance = new self(self::DEFAULT_RULES_NAMESPACES, self::DEFAULT_EXCEPTIONS_NAMESPACES);
        }

        return self::$defaultInstance;
    }

    /**
     * Creates a rule.
     *
     * @param string $ruleName
     * @param array $arguments
     *
     * @throws ComponentException
     *
     * @return Validatable
     */
    public function rule(string $ruleName, array $arguments = []): Validatable
    {
        foreach ($this->rulesNamespaces as $namespace) {
            $className = sprintf('%s\\%s', $namespace, ucfirst($ruleName));
            if (!class_exists($className)) {
                continue;
            }

            $reflection = new ReflectionClass($className);
            if (!$reflection->isSubclassOf('Respect\\Validation\\Validatable')) {
                throw new ComponentException(sprintf('"%s" не является валидным правилом', $className));
            }

            $name = $validatable->getName() ?: stringify($input);
            $params = ['input' => $input] + $extraParams + $this->extractPropertiesValues($validatable, $reflection);

            return $this->createValidationException($exceptionName, $name, $params);
        }

        throw new ComponentException(sprintf('"%s" не является валидным именем правила', $ruleName));
    }
}
