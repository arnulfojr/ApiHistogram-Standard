<?php

namespace ApiHistogramBundle\Validators;

use ApiHistogramBundle\Exception\Validation\ValidatorException;

/**
 * Interface ValidatorInterface
 * @package ApiHistogramBundle\Validators
 */
interface ValidatorInterface
{
    /**
     * @param $target
     * @param null $context
     * @return boolean
     * @throws ValidatorException
     */
    public function validate($target, $context = NULL);
}