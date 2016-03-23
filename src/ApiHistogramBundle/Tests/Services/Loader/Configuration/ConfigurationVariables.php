<?php

namespace ApiHistogramBundle\Tests\Services\Loader\Configuration;


use ApiHistogramBundle\Container\Configuration\Configuration;
use ApiHistogramBundle\Container\Configuration\SiteCapsule;
use ApiHistogramBundle\Container\Configuration\URL\URL;

/**
 * Class ConfigurationVariables
 * @package ApiHistogramBundle\Tests\Services\Loader\Configuration
 */
class ConfigurationVariables
{

    const CONFIGURATION_BUILDER_CLASS = 'ApiHistogramBundle\Services\Loader\Configuration\Builder\ConfigurationBuilder';

    /**
     * @return array
     */
    public static function getConfig()
    {
        return [
            "connection"=>"default",
            "schema_name"=>"api_histogram",
            "sites"=>[
                "currency"=>[
                    "name"=>"Currency",
                    "url"=>"http://www.google.com",
                    "formatter"=>'ApiHistogram\Formatter\Class',
                    "database"=>[
                        "table_name"=>"currency"
                    ]
                ],
                "stocks"=>[
                    "name"=>"Stocks",
                    "url"=>"http://www.yahoo.com",
                    "formatter"=>'ApiHistogram\Formatter\AnotherClass',
                    "database"=>[
                        "table_name"=>"stocks"
                    ]
                ]
            ]
        ];
    }

    /**
     * @return array
     */
    public static function getSitesConfig()
    {
        return ConfigurationVariables::getConfig()["sites"];
    }

    /**
     * @return array
     */
    public static function getSiteCapsules()
    {
        $toReturn = [];

        $sites = ConfigurationVariables::getSitesConfig();

        foreach($sites as $name=>$site)
        {
            $web = new SiteCapsule();
            $url = new URL();

            $web->setFormatterName($site["formatter"]);
            $web->setTableName($site["database"]["table_name"]);
            $web->setName($site["name"]);

            $url->setUrl($site["url"]);
            $web->setURL($url);

            $toReturn[$name] = $web;
        }

        return $toReturn;
    }

    /**
     * @return Configuration
     */
    public static function getSystemConfig()
    {
        $config = new Configuration();
        $config->setSites(ConfigurationVariables::getSiteCapsules());
        $config->setConnectionName(ConfigurationVariables::getConfig()["connection"]);
        $config->setSchemaName(ConfigurationVariables::getConfig()["schema_name"]);

        return $config;
    }

}