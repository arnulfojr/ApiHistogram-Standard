<?php

namespace ApiHistogramBundle\Repository\Dynamic;


use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;
use ApiHistogramBundle\Exception\ExceptionParameters;
use ApiHistogramBundle\Exception\Repository\RepositoryException;
use ApiHistogramBundle\Services\SiteManager\SiteManager;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\DBAL\DBALException;

/**
 * Class DynamicRepository
 * @package ApiHistogramBundle\Repository\Dynamic
 */
class DynamicRepository extends DynamicEntityManager
{
    /** @var SiteManager $siteManager */
    private $siteManager;

    /**
     * DynamicRepository constructor.
     * @param Registry $doctrine
     * @param SiteManager $siteManager
     */
    public function __construct(Registry $doctrine, SiteManager $siteManager)
    {
        parent::__construct($doctrine);

        $this->siteManager = $siteManager;
    }


    /**
     * @param SiteCapsuleInterface $capsule
     * @param array $parameters
     * @return int
     * @throws RepositoryException
     */
    public function executeInsertSQL(SiteCapsuleInterface $capsule, array $parameters)
    {
        try
        {
            $sysConfig = $this->siteManager->getSystemConfiguration();
            $connectionName = $sysConfig->getConnectionName();

            $this->setUp($connectionName);

            $connection = $this->getConnection();

            // Set schema.tableName to save in
            $tableExpression = $this->getTableExpression($capsule, $sysConfig);

            return $connection->insert($tableExpression, $parameters);
        }
        catch (RepositoryException $e)
        {
            throw new RepositoryException(
                ExceptionParameters::EXECUTE_INSERT_ENTITY_MANAGER_NULL,
                ExceptionParameters::EXECUTE_INSERT_ENTITY_MANAGER_NULL_CODE,
                $e
            );
        }
        catch (DBALException $e)
        {
            throw new RepositoryException(
                ExceptionParameters::getExecuteInsertDBALException($e->getMessage()),
                ExceptionParameters::EXECUTE_INSERT_DBAL_EXCEPTION_CODE,
                $e
            );
        }
    }

    /**
     * Creates Table needed to persist the wished response
     * @param SiteCapsuleInterface $capsule
     * @param array $parameters
     */
    protected function createTable(SiteCapsuleInterface $capsule, array $parameters)
    {
        // TODO: implement this here!
    }

}