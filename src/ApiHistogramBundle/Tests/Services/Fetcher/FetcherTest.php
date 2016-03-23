<?php

namespace ApiHistogramBundle\Tests\Services\Fetcher;

use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;
use ApiHistogramBundle\Container\Configuration\URL\URL;
use ApiHistogramBundle\Services\Fetcher\Fetcher;
use \PHPUnit_Framework_TestCase as TestCase;

class FetcherTest extends TestCase
{
    /** @var Fetcher $fetcher */
    private $fetcher;

    public function setUp()
    {
        parent::setUp();

        $this->fetcher = new Fetcher();
    }

    /**
     * @param string $urlString
     * @dataProvider urlProvider
     */
    public function testFetch($urlString)
    {
        $siteCapsuleMock = $this->prophesize(ConfigurationVariables::SITE_CAPSULE_SPACE_NAME);
        $URLMock = $this->prophesize(ConfigurationVariables::URL_SPACE_NAME);

        $URLMock
            ->getAsString()
            ->willReturn($urlString);

        /** @var URL $URL */
        $URL = $URLMock->reveal();

        $siteCapsuleMock
            ->getURL()
            ->willReturn($URL);

        /** @var SiteCapsuleInterface $siteCapsule */
        $siteCapsule = $siteCapsuleMock->reveal();

        $this->assertNotNull($this->fetcher->fetch($siteCapsule));
    }


    /**
     * @return array
     */
    public function urlProvider()
    {
        return [
            [
                'http://www.moreandcoffee.com/dataManager?data=places'
            ]
        ];
    }

}