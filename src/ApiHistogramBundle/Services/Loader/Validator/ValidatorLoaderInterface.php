<?php

namespace ApiHistogramBundle\Services\Loader\Validator;

/**
 * Interface ValidatorLoaderInterface
 * @package ApiHistogramBundle\Services\Loader
 */
interface ValidatorLoaderInterface
{
    /**
     * @param array $validators
     * @return ValidatorLoaderInterface
     */
    public function setValidators(array $validators);

}