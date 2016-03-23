<?php

namespace ApiHistogramBundle\Tests\Services\Loader\Configuration\Builder;

use ApiHistogramBundle\Container\Configuration\Configuration;
use ApiHistogramBundle\Services\Loader\Configuration\Builder\ConfigurationBuilder;
use ApiHistogramBundle\Services\Loader\Configuration\Builder\ConfigurationBuilderInterface;
use ApiHistogramBundle\Tests\Services\Loader\Configuration\ConfigurationVariables;
use \PHPUnit_Framework_TestCase as PHPUnit_TestCase;

/**
 * Class ConfigurationBuilderTest
 * @package ApiHistogramBundle\Tests\Services\Loader\Configuration\Builder
 */
class ConfigurationBuilderTest extends PHPUnit_TestCase
{
    const CONFIGURATION_BUILDER_CLASS = 'ApiHistogramBundle\Services\Loader\Configuration\Builder\ConfigurationBuilder';

    /** @var array $config */
    private $config;

    /** @var ConfigurationBuilderInterface $configurationBuilder */
    private $configurationBuilder;

    /**
     * Set up configuration before the tests
     */
    public function setUp()
    {
        parent::setUp();

        $this->configurationBuilder = new ConfigurationBuilder();

        $this->config = ConfigurationVariables::getConfig();
    }

    /**
     * @param array $expectedSites
     * @dataProvider siteCapsuleProvider
     */
    public function testBuildSites($expectedSites)
    {
        $this->configurationBuilder->setConfig($this->config);

        $this->assertEquals($expectedSites, $this->configurationBuilder->buildSites());
    }

    /**
     * @param $expectedSystemConfig
     * @dataProvider sysConfigProvider
     */
    public function testBuildSystemConfig($expectedSystemConfig)
    {
        $this->configurationBuilder->setConfig($this->config);

        $this->assertEquals($expectedSystemConfig, $this->configurationBuilder->buildSystemConfiguration());
    }

    /**
     * @return array
     */
    public function siteCapsuleProvider()
    {
        $toReturn = ConfigurationVariables::getSiteCapsules();

        $toReturn = [[$toReturn]];

        return $toReturn;
    }

    /**
     * @return array
     */
    public function sysConfigProvider()
    {
        $toReturn = [];

        $config = ConfigurationVariables::getSystemConfig();

        $toReturn[][] = $config;

        return $toReturn;
    }

}