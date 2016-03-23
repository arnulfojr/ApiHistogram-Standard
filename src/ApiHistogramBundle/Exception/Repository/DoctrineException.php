<?php

namespace ApiHistogramBundle\Exception\Repository;

use \Exception;

/**
 * Class DoctrineException
 * @package ApiHistogramBundle\Exception\Repository
 */
class DoctrineException extends RepositoryException
{
    public function __construct($message, $code, Exception $previous)
    {
        parent::__construct($message, $code, $previous);
    }
}