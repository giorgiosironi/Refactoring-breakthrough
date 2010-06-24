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

    public function loadSupplies($beverageName, $quantity = null)
    {
        if ($quantity === null) {
            if ($beverageName == "Chocolate") {
                $quantity = 10;
            } else {
                throw new InvalidArgumentException("Only Chocolate has a predefined quantity of supplies to load.");
            }
        }
        $this->supplies[$beverageName] += $quantity;
    }

    public function getSupplies($beverageName)
    {
        return $this->supplies[$beverageName];
    }
}
