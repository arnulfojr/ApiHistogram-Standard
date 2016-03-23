<?php

namespace ApiHistogramBundle\Services\Persist;

use ApiHistogramBundle\Cleaners\CleanerInterface;
use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;
use ApiHistogramBundle\Exception\ApiHistogramException;
use ApiHistogramBundle\Repository\Dynamic\DynamicRepository;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class Persist
 * @package ApiHistogramBundle\Services\Persist
 */
class Persist extends BasePersistent implements PersistInterface
{
    /**
     * Persist constructor.
     * @param DynamicRepository $repository
     */
    public function __construct(DynamicRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param SiteCapsuleInterface $capsule
     * @param $response
     * @param null $io
     * @throws ApiHistogramException
     * @return void
     */
    public function persist(SiteCapsuleInterface $capsule, $response, $io = NULL)
    {
        /** @var CleanerInterface $cleaner */
        $cleaner = $capsule->getCleaner();

        /** @var SymfonyStyle $io */

        if (!is_null($cleaner))
        {
            $cleanedResponse = $cleaner->clean($response);

            $toSave = $cleaner->structure($cleanedResponse);

            if (!is_null($io))
            {
                $io->note("Will persist data fetched for {$capsule->getName()}");
            }

            $this->save($capsule, $toSave, $io);

            return;
        }

        if (!is_null($io))
        {
            // TODO: Change the description for constants!
            $io->error("Cleaner was not loaded");
        }
        throw new ApiHistogramException("", 2);
    }

}