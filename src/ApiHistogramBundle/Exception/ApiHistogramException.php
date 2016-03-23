<?php

namespace ApiHistogramBundle\Exception;

use \Exception;

/**
 * Class ApiHistogramException
 * @package ApiHistogramBundle\Exception
 */
class ApiHistogramException extends Exception
{
    /**
     * ApiHistogramException constructor.
     * @param string $message
     * @param int $code
     * @param Exception $previous
     */
    public function __construct($message, $code = 500, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}