<?php

namespace ApiHistogramBundle\Tests\Services\Loader\Validator;

use ApiHistogramBundle\Services\Loader\Validator\ValidatorLoader;
use ApiHistogramBundle\Validators\Loader\ImplementsInterfaceValidator;
use ApiHistogramBundle\Validators\Validate;
use \PHPUnit_Framework_TestCase as TestCase;
use \ReflectionClass;
use ApiHistogramBundle\Tests\Validators\ConfigurationVariables as ValidatorsVariables;

/**
 * Class ValidatorLoaderTest
 * @package ApiHistogramBundle\Tests\Services\Loader\Validator
 */
class ValidatorLoaderTest extends TestCase
{

    /**
     * @param $validators
     * @param $expected
     * @dataProvider validatorProvider
     */
    public function testLoad($validators, $expected)
    {
        $validateMock = $this->prophesize(ValidatorsVariables::VALIDATE_NAMESPACE);

        // config

        /** @var Validate $validate */
        $validate = $validateMock->reveal();

        $validatorLoader = new ValidatorLoader($validate);

        $this->assertEquals($expected, $validatorLoader->instantiate($validators));
    }

    /**
     * @return array
     */
    public function validatorProvider()
    {
        return [
            [
                [
                    ValidatorsVariables::IMPLEMENTS_INTERFACE_VALIDATOR_CLASS
                ],
                [
                    new ImplementsInterfaceValidator()
                ]
            ],
        ];
    }

}