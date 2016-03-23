<?php

namespace ApiHistogramBundle\Tests\Services\Loader;

use ApiHistogramBundle\Cleaners\CleanerInterface;
use ApiHistogramBundle\Services\Loader\ClassLoader;
use \PHPUnit_Framework_TestCase as TestCase;

/**
 * Class ClassLoaderTest
 * @package ApiHistogramBundle\Tests\Services\Loader
 */
class ClassLoaderTest extends TestCase
{
    /** @var ClassLoader $classLoader */
    private $classLoader;

    public function setUp()
    {
        parent::setUp();
        $this->classLoader = new ClassLoader();
    }

    /**
     * @param $classNamespace
     * @dataProvider classNamespaceCleanersImplementationProvider
     */
    public function testLoadCleanerImplementationTrue($classNamespace)
    {
        /** @var CleanerInterface $cleaner */
        $cleaner = $this->classLoader->load($classNamespace);

        $implementations = class_implements($cleaner);

        $this->assertArrayHasKey(ConfigurationVariables::CLEANER_INTERFACE_CLASS, $implementations);
    }

    /**
     * @param $classNamespace
     * @dataProvider classNamespaceProvider
     */
    public function testLoadCleanerNoImplementation($classNamespace)
    {
        /** @var \ReflectionClass $cleaner */
        $cleaner = $this->classLoader->load($classNamespace);

        $implementations = class_implements($cleaner);

        $this->assertArrayNotHasKey(ConfigurationVariables::CLEANER_INTERFACE_CLASS, $implementations);
    }

    /**
     * @param $classNamespace
     * @dataProvider nonExistentClassNamespaceProvider
     * @expectedException ApiHistogramBundle\Exception\Loader\LoaderException
     */
    public function testNonExistentClassNamespace($classNamespace)
    {
        $class = $this->classLoader->load($classNamespace);

        $this->assertNotNull($class, "Class in NULL");
    }

    /**
     * @return array
     */
    public function nonExistentClassNamespaceProvider()
    {
        return [
            [
                'ApiHistogramBundle\Cleaners\CurrencyCleaners'
            ],
        ];
    }

    /**
     * @return array
     */
    public function classNamespaceCleanersImplementationProvider()
    {
        return [
            [
                'ApiHistogramBundle\Cleaners\CurrencyCleaner'
            ],
        ];
    }

    /**
     * @return array
     */
    public function classNamespaceProvider()
    {
        return [
            [
                'ApiHistogramBundle\Container\Configuration\SiteCapsule'
            ],
        ];
    }

}