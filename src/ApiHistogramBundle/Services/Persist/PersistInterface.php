<?php

namespace ApiHistogramBundle\Services\Persist;

use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;

/**
 * Interface PersistInterface
 * @package ApiHistogramBundle\Services\Persist
 */
interface PersistInterface
{
    /**
     * @param SiteCapsuleInterface $capsule
     * @param $response
     * @param null $io
     * @return array|void
     */
    public function persist(SiteCapsuleInterface $capsule, $response, $io = NULL);
}