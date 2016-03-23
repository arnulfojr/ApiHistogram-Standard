<?php

namespace ApiHistogramBundle\Cleaners;

use GuzzleHttp\Message\Response;

/**
 * Class YahooStockCleaner
 * @package ApiHistogramBundle\Cleaners
 */
class YahooStockCleaner implements CleanerInterface
{

    /**
     * This method process the response data to remove all unnecessary fields in the response
     * @param $response
     * @return mixed
     */
    public function clean(Response $response)
    {
        // TODO: Implement clean() method.
    }

    /**
     * This method processes the cleaned response from the clean($r) method, into a Doctrine
     * friendly format.
     * Consider this doctrine documentation:
     * http://doctrine-orm.readthedocs.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#insert
     * @param $response
     * @return mixed
     */
    public function structure($response)
    {
        // TODO: Implement structure() method.
    }
}