<?php

namespace ApiHistogramBundle\Services\Loader\Configuration\Builder;


use ApiHistogramBundle\Container\Configuration\SiteCapsule;
use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;
use ApiHistogramBundle\Container\Configuration\URL\URL;

/**
 * Class SiteBuilder
 * @package ApiHistogramBundle\Services\Loader\Configuration\Builder
 */
class SiteBuilder implements BuilderInterface
{

    /**
     * @param array $options
     * @return SiteCapsuleInterface
     */
    public function build($options = NULL)
    {
        $site = new SiteCapsule();
        $url = new URL();

        $site->setFormatterName($options["formatter"]);
        $site->setName($options["name"]);
        $site->setTableName($options["database"]["table_name"]);

        $url->setUrl($options["url"]);

        $site->setURL($url);

        return $site;
    }
}