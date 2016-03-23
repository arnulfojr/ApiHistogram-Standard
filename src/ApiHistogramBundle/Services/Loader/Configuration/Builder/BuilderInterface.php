<?php

namespace ApiHistogramBundle\Services\Loader\Configuration\Builder;

/**
 * Interface BuilderInterface
 * @package ApiHistogramBundle\Services\Loader\Configuration\Builder
 */
interface BuilderInterface
{
    /**
     * @param array $options
     * @return mixed
     */
    public function build($options = NULL);
}