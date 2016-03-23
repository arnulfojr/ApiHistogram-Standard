<?php

namespace ApiHistogramBundle\Tests\Services\Loader\Cleaner;

use ApiHistogramBundle\Services\Loader\Cleaner\CleanerLoader;
use ApiHistogramBundle\Services\Loader\Validator\ValidatorLoader;
use ApiHistogramBundle\Tests\Services\Loader\ConfigurationVariables;
use ApiHistogramBundle\Validators\Validate;
use \PHPUnit_Framework_TestCase as TestCase;

/**
 * Class CleanerLoaderTest
 * @package ApiHistogramBundle\Tests\Services\Loader\Cleaner
 */
class CleanerLoaderTest extends TestCase
{
    /** @var CleanerLoader $loader */
    private $loader;
    /** @var Validate $validate */
    private $validate;
    /** @var ValidatorLoader $validatorLoader */
    private $validatorLoader;

    public function setUp()
    {
        parent::setUp();

        $validateMock = $this->prophesize(ConfigurationVariables::VALIDATE_CLASS);
        $validatorLoaderMock = $this->prophesize(ConfigurationVariables::VALIDATOR_LOADER_CLASS);

        // config them!

        $validateMock
            ->validate()
            ->willReturn(True);

        /** @var Validate validate */
        $this->validate = $validateMock->reveal();
        /** @var ValidatorLoader validatorLoader */
        $this->validatorLoader = $validatorLoaderMock->reveal();

        $this->loader = new CleanerLoader($this->validate, $this->validatorLoader);
    }

    public function testInstantiate()
    {
        // NO TEST DEVELOPED YET
    }

}