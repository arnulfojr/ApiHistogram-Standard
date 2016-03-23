<?php
/**
 * Created by PhpStorm.
 * User: arnulfosolis
 * Date: 3/17/16
 * Time: 14:08
 */

namespace ApiHistogramBundle\Services\Loader;


interface InstantiateInterface
{
    /**
     * @return mixed
     */
    public function instantiate();
}