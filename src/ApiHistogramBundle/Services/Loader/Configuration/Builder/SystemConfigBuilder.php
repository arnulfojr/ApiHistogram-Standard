<?php
/**
 * Created by PhpStorm.
 * User: arnulfosolis
 * Date: 3/15/16
 * Time: 18:34
 */

namespace ApiHistogramBundle\Services\Loader\Configuration\Builder;


use ApiHistogramBundle\Container\Configuration\Configuration;
use ApiHistogramBundle\Container\Configuration\ConfigurationInterface;

/**
 * Class SystemConfigBuilder
 * @package ApiHistogramBundle\Services\Loader\Configuration\Builder
 */
class SystemConfigBuilder implements BuilderInterface
{
    /**
     * @param array $options
     * @return ConfigurationInterface
     */
    public function build($options = NULL)
    {
        $config = new Configuration();

        $config->setConnectionName($options["connection"]);
        $config->setSchemaName($options["schema_name"]);
        $config->setSites($options["sites"]);

        return $config;
    }
}