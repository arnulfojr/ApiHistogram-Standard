<?php

namespace ApiHistogramBundle\Validators;
use ApiHistogramBundle\Validators\Loader\ImplementsInterfaceValidator;


/**
 * Class Validators
 * @package ApiHistogramBundle\Validators
 */
class Validators
{

    const VALIDATOR_INTERFACE = 'ApiHistogramBundle\Validators\ValidatorInterface';

    /**
     * @param string $interfaceName
     * @return array
     */
    static public function getContextSkeletonForImplementsInterface($interfaceName = '')
    {
        return [
            ImplementsInterfaceValidator::CONTEXT_INTERFACE_KEY=>$interfaceName
        ];
    }

    /**
     * @return array
     */
    static public function forCleaners()
    {
        return [
            'ApiHistogramBundle\Validators\Loader\ImplementsInterfaceValidator',
        ];
    }

    /**
     * @return array
     */
    static public function forValidatorLoader()
    {
        return [
            new ImplementsInterfaceValidator()
        ];
    }

}