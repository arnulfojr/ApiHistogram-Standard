<?php

namespace ApiHistogramBundle\Services\Fetcher\Response;
use ApiHistogramBundle\Container\Configuration\SiteCapsuleInterface;
use GuzzleHttp\Message\FutureResponse;

/**
 * Interface HandlerInterface
 * @package ApiHistogramBundle\Services\Fetcher\Response
 */
interface HandlerInterface
{
    /**
     * @param FutureResponse $response
     * @param SiteCapsuleInterface $capsule
     * @return mixed
     */
    public function handle(FutureResponse $response, SiteCapsuleInterface $capsule);

    /**
     * @param $mixed
     * @return HandlerInterface
     */
    public function setIO($mixed);

}