<?php

namespace ApiHistogramBundle\Container\Configuration;

/**
 * Interface ConfigurationInterface
 * @package ApiHistogramBundle\Container\Configuration
 *
 * Contains the data for the system
 */
interface ConfigurationInterface
{
    /**
     * @return string
     */
    public function getConnectionName();

    /**
     * @return string
     */
    public function getSchemaName();

    /**
     * @return array
     */
    public function getSites();
}