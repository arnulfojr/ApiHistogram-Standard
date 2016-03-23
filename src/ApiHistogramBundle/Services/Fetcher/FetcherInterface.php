<?php

namespace ApiHistogramBundle\Services\Fetcher;

use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;

/**
 * Interface FetcherInterface
 * @package ApiHistogramBundle\Services\Fetcher
 */
interface FetcherInterface
{
    /**
     * @param SiteCapsuleInterface|NULL $siteCapsuleInterface
     * @param array|NULL $args
     * @return mixed
     */
    public function fetch(SiteCapsuleInterface $siteCapsuleInterface = NULL, array $args = NULL);
}