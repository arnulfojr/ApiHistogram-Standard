<?php

namespace ApiHistogramBundle\Services\Loader;

use ApiHistogramBundle\Exception\ExceptionParameters;
use ApiHistogramBundle\Exception\Loader\LoaderException;
use \ReflectionClass;
use \ReflectionException;

/**
 * Class ClassLoader
 * @package ApiHistogramBundle\Services\Loader
 */
class ClassLoader
{
    /**
     * @param string $classNamespace
     * @param array|null $args
     * @throws LoaderException
     * @return ReflectionClass
     */
    public function load($classNamespace, array $args = null)
    {
        try
        {
            $reflectedClass = new ReflectionClass($classNamespace);

            if (is_null($args))
            {
                return $reflectedClass->newInstanceArgs();
            }

            return $reflectedClass->newInstanceArgs($args);
        }
        catch (ReflectionException $e)
        {
            throw new LoaderException(
                ExceptionParameters::getLoaderFailedMessage($classNamespace),
                ExceptionParameters::LOADER_FAILED_CODE,
                $e
            );
        }
    }

}