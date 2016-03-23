<?php

namespace ApiHistogramBundle\Container\Configuration;
use ApiHistogramBundle\Cleaners\CleanerInterface;
use ApiHistogramBundle\Container\Configuration\URL\URLContainerInterface;

/**
 * Interface SiteCapsuleInterface
 * @package ApiHistogramBundle\Container
 * Contain the data from the Sites
 */
interface SiteCapsuleInterface
{
    /**
     * @return string
     */
    public function getTableName();

    /**
     * @param string $tableName
     * @return SiteCapsuleInterface
     */
    public function setTableName($tableName);

    /**
     * @param string $name
     * @return SiteCapsuleInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param URLContainerInterface $url
     * @return SiteCapsuleInterface
     */
    public function setURL(URLContainerInterface $url);

    /**
     * @return URLContainerInterface
     */
    public function getURL();

    /**
     * @param string $formatterName
     * @return SiteCapsuleInterface
     */
    public function setFormatterName($formatterName);

    /**
     * @return string
     */
    public function getFormatterName();

    /**
     * @param CleanerInterface $cleanerInterface
     * @return SiteCapsuleInterface
     */
    public function setCleaner(CleanerInterface $cleanerInterface);

    /**
     * @return CleanerInterface
     */
    public function getCleaner();

}