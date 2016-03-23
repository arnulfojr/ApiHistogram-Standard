<?php

namespace ApiHistogramBundle\Exception\Persist;

use ApiHistogramBundle\Exception\ApiHistogramException;
use \Exception;

/**
 * Class PersistException
 * @package ApiHistogramBundle\Exception\Persist
 */
class PersistException extends ApiHistogramException
{
    /**
     * PersistException constructor.
     * @param string $message
     * @param int $code
     * @param Exception|NULL $previous
     */
    public function __construct($message, $code, Exception $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
    }
}