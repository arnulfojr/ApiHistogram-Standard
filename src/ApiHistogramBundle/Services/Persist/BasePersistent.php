<?php

namespace ApiHistogramBundle\Services\Persist;

use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;
use ApiHistogramBundle\Exception\ExceptionParameters;
use ApiHistogramBundle\Exception\Persist\PersistException;
use ApiHistogramBundle\Exception\Repository\RepositoryException;
use ApiHistogramBundle\Repository\Dynamic\DynamicRepository;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class BasePersistent
 * @package ApiHistogramBundle\Services\Persist
 */
class BasePersistent
{
    /** @var DynamicRepository $repository */
    protected $repository;

    /**
     * BasePersistent constructor.
     * @param DynamicRepository $repository
     */
    public function __construct(DynamicRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param SiteCapsuleInterface $capsule
     * @param array $toSave
     * @param null $io
     * @throws PersistException
     */
    protected function save(SiteCapsuleInterface $capsule, array $toSave, $io = NULL)
    {
        try
        {
            if (!is_null($io))
            {
                /** @var SymfonyStyle $io */
                $io->text("Will save {$capsule->getName()}");
            }
            $this->repository->executeInsertSQL($capsule, $toSave);
        }
        catch (RepositoryException $e)
        {
            $message = ExceptionParameters::PERSISTENT_INSERT_ERROR_MESSAGE;
            $code = (is_null($e->getCode()) || $e->getCode() === 0) ? ExceptionParameters::PERSISTENT_INSERT_ERROR_CODE : $e->getCode();

            throw new PersistException(
                "{$message}, {$e->getMessage()}",
                $code,
                $e
            );
        }
    }
}