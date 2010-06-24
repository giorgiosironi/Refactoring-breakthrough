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

    public function loadSupplies($beverageName, $optionalQuantity = null)
    {
        $quantity =  $this->getSuppliesQuantity($beverageName, $optionalQuantity);

        $this->supplies[$beverageName] += $quantity;
    }

    private function getSuppliesQuantity($beverageName, $quantity)
    {
        if ($quantity === null) {
            if ($beverageName == "Chocolate") {
                return 10;
            } else {
                throw new InvalidArgumentException("Only Chocolate has a predefined quantity of supplies to load.");
            }
        }
        return $quantity;
    }

    public function getSupplies($beverageName)
    {
        return $this->supplies[$beverageName];
    }
}
