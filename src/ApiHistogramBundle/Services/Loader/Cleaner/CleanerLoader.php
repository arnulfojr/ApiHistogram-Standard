<?php

namespace ApiHistogramBundle\Services\Loader\Cleaner;

use ApiHistogramBundle\Cleaners\CleanerInterface;
use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;
use ApiHistogramBundle\Exception\Validation\ValidatorException;
use ApiHistogramBundle\Services\Loader\ClassLoader;
use ApiHistogramBundle\Services\Loader\InstantiateInterface;
use ApiHistogramBundle\Services\Loader\Validator\ValidatorLoader;
use ApiHistogramBundle\Validators\Validate;
use ApiHistogramBundle\Validators\Validators;
use ApiHistogramBundle\Exception\Loader\LoaderException;

/**
 * Class CleanerLoader
 * @package ApiHistogramBundle\Services\Loader\Cleaner
 */
class CleanerLoader extends ClassLoader implements InstantiateInterface
{
    /** @var array $siteCapsules */
    private $siteCapsules = NULL;
    /** @var ValidatorLoader $validatorLoader */
    private $validatorLoader;
    /** @var Validate $validate */
    private $validate;

    const CLEANER_INTERFACE = 'ApiHistogramBundle\Cleaners\CleanerInterface';


    /**
     * CleanerLoader constructor.
     * @param Validate $validate
     * @param ValidatorLoader $validatorLoader
     */
    public function __construct(Validate $validate, ValidatorLoader $validatorLoader)
    {
        $this->validate = $validate;
        $this->validatorLoader = $validatorLoader;
    }

    /**
     * @param array $siteCapsules
     * @throws ValidatorException
     * @throws LoaderException
     * @return array
     */
    public function instantiate(array $siteCapsules = NULL)
    {
        $validators = $this->getValidators();
        $siteCapsules = $this->decideCapsules($siteCapsules);
        $contexts = $this->getContexts();

        /** @var SiteCapsuleInterface $capsule */
        foreach ($siteCapsules as $capsule)
        {
            /** @var CleanerInterface $cleaner */
            $cleaner = $this->load($capsule->getFormatterName());

            $this->validate->validate($cleaner, $validators, $contexts);

            $capsule->setCleaner($cleaner);
        }

        return $siteCapsules;
    }

    /**
     * @return array
     * @throws LoaderException
     */
    protected function getValidators()
    {
        $validators = Validators::forCleaners();
        $validators = $this->validatorLoader->instantiate($validators);

        return $validators;
    }

    /**
     * @return array
     */
    protected function getContexts()
    {
        $contexts = [];

        $contexts[] = Validators::getContextSkeletonForImplementsInterface(CleanerLoader::CLEANER_INTERFACE);

        return $contexts;
    }

    /**
     * @param array $capsules
     * @return $this
     */
    public function setCleanersNamespaces(array $capsules)
    {
        $this->siteCapsules = $capsules;
        return $this;
    }

    /**
     * @param array|NULL $siteCapsules
     * @return array
     */
    protected function decideCapsules(array $siteCapsules = NULL)
    {
        if (is_null($siteCapsules))
        {
            return $this->siteCapsules;
        }
        return $siteCapsules;
    }

}