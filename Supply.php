<?php
interface Supply
{
    /**
     * @return string
     */
    public function getBeverageName();

    /**
     * @return integer
     */
    public function getQuantity();
}
