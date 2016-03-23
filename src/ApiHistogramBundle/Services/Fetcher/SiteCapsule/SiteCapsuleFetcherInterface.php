<?php

namespace ApiHistogramBundle\Services\Fetcher\SiteCapsule;

use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;
use ApiHistogramBundle\Services\Fetcher\FetcherInterface;

/**
 * Interface SiteCapsuleFetcherInterface
 * @package ApiHistogramBundle\Services\Fetcher
 */
interface SiteCapsuleFetcherInterface extends FetcherInterface
{
    /**
     * @param SiteCapsuleInterface $siteCapsuleInterface
     * @return SiteCapsuleFetcherInterface
     */
    public function setSiteCapsule(SiteCapsuleInterface $siteCapsuleInterface);

    /**
     * @return SiteCapsuleInterface
     */
    public function getSiteCapsule();

}