<?php

namespace ApiHistogramBundle\Services\Loader\Configuration\Builder;

use ApiHistogramBundle\Container\Configuration\ConfigurationInterface;

interface ConfigurationBuilderInterface
{
    /**
     * @param array $config
     * @return ConfigurationBuilderInterface
     */
    public function setConfig($config);

    /**
     * @return array
     */
    public function buildSites();

    /**
     * @return ConfigurationInterface
     */
    public function buildSystemConfiguration();

}