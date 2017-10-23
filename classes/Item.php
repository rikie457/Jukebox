<?php

/**
 * Class Item
 *
 *Deze class beheerd het aantal items van een search.
 */
class Item
{
    /**
     * Item constructor.
     */
    function __construct()
    {
        $this->max = NULL;
    }

    /**
     * Deze functie zet $max
     *
     * @param $int
     */
    function setMax($int)
    {
        $this->max = $int;
    }

    /**
     * Deze functie haalt $max op.
     *
     * @return null
     */
    function getMax()
    {
        return $this->max;
    }
}