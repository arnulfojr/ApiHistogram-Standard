<?php

namespace ApiHistogramBundle\Cleaners;

use ApiHistogramBundle\Exception\Cleaners\CleanerException;
use ApiHistogramBundle\Exception\ExceptionParameters;
use GuzzleHttp\Message\Response;

/**
 * Class CurrencyCleaner
 * @package ApiHistogramBundle\Cleaners
 */
class CurrencyCleaner implements CleanerInterface
{

    const QUOTES = 'quotes';

    /**
     * @param $response
     * @return mixed
     */
    public function clean(Response $response)
    {
        $content = $response->json();
        $cleaned = $this->removeAttributes($content, $this->getRemovableAttributes());

        $cleaned[CurrencyCleaner::QUOTES] = $this->renameKeys(
            $cleaned[CurrencyCleaner::QUOTES],
            $this->getNewKeys()
        );

        return $cleaned;
    }

    /**
     * @param $unstructured
     * @return mixed
     * @throws CleanerException
     */
    public function structure($unstructured)
    {
        //only put quotes one level up
        if (array_key_exists(CurrencyCleaner::QUOTES, $unstructured))
        {
            foreach ($unstructured[CurrencyCleaner::QUOTES] as $name=>$value)
            {
                $unstructured[$name] = $value;
                unset($unstructured[CurrencyCleaner::QUOTES][$name]);
            }

            unset($unstructured[CurrencyCleaner::QUOTES]);

            return $unstructured;
        }

        throw new CleanerException(
            ExceptionParameters::CLEANER_EXCEPTION_MESSAGE,
            ExceptionParameters::CLEANER_EXCEPTION_STRUCTURE_CODE
        );
    }

    /**
     * @param array $dirty
     * @param array $removable
     * @return array
     */
    protected function removeAttributes(array $dirty, array $removable)
    {
        $cleaned = $dirty;

        foreach ($removable as $attr)
        {
            if (array_key_exists($attr, $cleaned))
            {
                unset($cleaned[$attr]);
            }
        }

        return $cleaned;
    }

    /**
     * @param array $dirty
     * @param array $keys
     * @return array
     */
    public function renameKeys(array $dirty, array $keys)
    {
        foreach ($keys as $old=>$new)
        {
            $dirty[$new] = $dirty[$old];
            unset($dirty[$old]);
        }

        return $dirty;
    }

    /**
     * @return array
     */
    static public function getNewKeys()
    {
        return [
            "USDUSD"=>"USD",
            "USDAUD"=>"AUD",
            "USDCAD"=>"CAD",
            "USDPLN"=>"PLN",
            "USDMXN"=>"MXN"
        ];
    }

    /**
     * @return array
     */
    static public function getRemovableAttributes()
    {
        return [
            'success',
            'terms',
            'privacy',
            'source'
        ];
    }

}