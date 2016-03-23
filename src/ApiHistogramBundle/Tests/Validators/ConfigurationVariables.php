<?php

namespace ApiHistogramBundle\Tests\Validators;

/**
 * Class ConfigurationVariables
 * @package ApiHistogramBundle\Tests\Validators
 */
class ConfigurationVariables
{
    const IMPLEMENTS_INTERFACE_VALIDATOR_CLASS = 'ApiHistogramBundle\Validators\Loader\ImplementsInterfaceValidator';

    const BUILDER_INTERFACE_NAMESPACE = 'ApiHistogramBundle\Services\Loader\Configuration\Builder\BuilderInterface';

    const INVALID_INTERFACE_NAMESPACE = 'ApiHistogramBundle\Validators\Loader\SomeInterface';

    const VALIDATE_NAMESPACE = 'ApiHistogramBundle\Validators\Validate';
}