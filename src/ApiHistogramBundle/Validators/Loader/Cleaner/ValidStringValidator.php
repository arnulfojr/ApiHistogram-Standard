<?php

namespace ApiHistogramBundle\Validators\Loader\Cleaner;

use ApiHistogramBundle\Exception\Validation\ValidatorException;
use ApiHistogramBundle\Validators\ValidatorInterface;

/**
 * Class ValidStringValidator
 * @package ApiHistogramBundle\Validators\Loader\Cleaner
 */
class ValidStringValidator implements ValidatorInterface
{

    /**
     * @param $target
     * @param null $context
     * @return boolean
     * @throws ValidatorException
     */
    public function validate($target, $context = NULL)
    {
        // TODO: Implement validate() method.
    }
}