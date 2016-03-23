<?php

namespace ApiHistogramBundle\Services\Update;

use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;

/**
 * Interface UpdaterInterface
 * @package ApiHistogramBundle\Services\Persist
 */
interface UpdaterInterface
{
    /**
     * @param SiteCapsuleInterface $siteCapsuleInterface
     * @return mixed
     */
    public function update(SiteCapsuleInterface $siteCapsuleInterface);
}