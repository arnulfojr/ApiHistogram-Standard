<?php

namespace ApiHistogramBundle\Tests\Validators\Loader;

use ApiHistogramBundle\Validators\Loader\ImplementsInterfaceValidator;

/**
 * Class ConfigurationVariables
 * @package ApiHistogramBundle\Tests\Validator\Loader
 */
class ConfigurationVariables
{

    const CONFIGURATION_CLASS = 'ApiHistogramBundle\Container\Configuration\Configuration';

    const CONFIGURATION_INTERFACE = 'ApiHistogramBundle\Container\Configuration\ConfigurationInterface';

    const IMPLEMENTS_INTERFACE_VALIDATOR_CLASS = 'ApiHistogramBundle\Validators\Loader\ImplementsInterfaceValidator';

    /**
     * @param string|NULL $interfaceName
     * @return array
     */
    static public function getImplementsInterfaceContextSkeleton($interfaceName = NULL)
    {
        $skeleton = [
            ImplementsInterfaceValidator::CONTEXT_INTERFACE_KEY=>""
        ];

        if (!is_null($interfaceName))
        {
            $skeleton[ImplementsInterfaceValidator::CONTEXT_INTERFACE_KEY] = $interfaceName;
        }

        return $skeleton;
    }

}