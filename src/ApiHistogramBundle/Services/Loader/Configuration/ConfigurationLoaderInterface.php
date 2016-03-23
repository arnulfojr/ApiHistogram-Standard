<?php

namespace ApiHistogramBundle\Services\Loader\Configuration;
use ApiHistogramBundle\Container\Configuration\ConfigurationInterface;

/**
 * Interface ConfigurationLoaderInterface
 * @package ApiHistogramBundle\Services\Loader\Configuration
 */
interface ConfigurationLoaderInterface
{
    /**
     * @return array
     * Returns an array of SiteContainerInterface
     */
    public function getSites();

    /**
     * @return array
     * Returns the normal configuration
     */
    public function getConfig(); // raw config

    /**
     * @return ConfigurationInterface
     */
    public function getSystemConfig();

    /**
     * @return null
     */
    public function load();

}