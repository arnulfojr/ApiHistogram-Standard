<?php

namespace ApiHistogramBundle\Exception\Command;

use ApiHistogramBundle\Exception\ApiHistogramException;
use \Exception;

/**
 * Class CommandException
 * @package ApiHistogramBundle\Exception\Command
 */
class CommandException extends ApiHistogramException
{
    public function __construct($message, $code = 500, Exception $e)
    {
        parent::__construct($message, $code, $e);
    }
}