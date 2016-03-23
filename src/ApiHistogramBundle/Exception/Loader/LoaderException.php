<?php

namespace ApiHistogramBundle\Exception\Loader;

use ApiHistogramBundle\Exception\ApiHistogramException;
use \Exception;

/**
 * Class LoaderException
 * @package ApiHistogramBundle\Exception\Loader
 */
class LoaderException extends ApiHistogramException
{
    /**
     * LoaderException constructor.
     * @param string $message
     * @param int $code
     * @param Exception|NULL $previous
     */
    public function __construct($message, $code = 500, Exception $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
    }
}