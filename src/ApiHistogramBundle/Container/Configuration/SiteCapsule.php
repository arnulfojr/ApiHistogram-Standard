<?php

namespace ApiHistogramBundle\Container\Configuration;


use ApiHistogramBundle\Cleaners\CleanerInterface;
use ApiHistogramBundle\Container\Configuration\URL\URLContainerInterface;

class SiteCapsule implements SiteCapsuleInterface
{
    /** @var string $tableName */
    private $tableName;
    /** @var string $name */
    private $name;
    /** @var URLContainerInterface $url */
    private $url;
    /** @var string $formatter */
    private $formatter;
    /** @var null|CleanerInterface $cleaner */
    private $cleaner = NULL;

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     * @return SiteCapsuleInterface
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * @param string $name
     * @return SiteCapsuleInterface
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param URLContainerInterface $url
     * @return SiteCapsuleInterface
     */
    public function setURL(URLContainerInterface $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return URLContainerInterface
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * @param string $formatterName
     * @return SiteCapsuleInterface
     */
    public function setFormatterName($formatterName)
    {
        $this->formatter = $formatterName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormatterName()
    {
        return $this->formatter;
    }

    /**
     * @param CleanerInterface $cleanerInterface
     * @return SiteCapsuleInterface
     */
    public function setCleaner(CleanerInterface $cleanerInterface)
    {
        $this->cleaner = $cleanerInterface;

        return $this;
    }

    /**
     * @return CleanerInterface
     */
    public function getCleaner()
    {
        return $this->cleaner;
    }
}