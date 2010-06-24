<?php
class CoffeeMachine
{
    /**
     * @array
     */
    private $supplies;

    public function __construct(array $beverages)
    {
        $this->supplies = array();
        foreach ($beverages as $name) {
            $this->supplies[$name] = 0;
        }
    }

    public function loadSupplies(Supply $supply)
    {
        $beverageName = $supply->getBeverageName();
        $quantity =  $supply->getQuantity();
        $this->supplies[$beverageName] += $quantity;
    }

    public function getSupplies($beverageName)
    {
        return $this->supplies[$beverageName];
    }
}
