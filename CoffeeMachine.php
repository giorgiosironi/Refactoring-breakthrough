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
        if ($beverageName == "Coffee" and $quantity % 5 != 0) {
            throw new InvalidArgumentException("Coffee supplies must come in multiples of 5.");
        }
        return $quantity;
    }

    public function getSupplies($beverageName)
    {
        return $this->supplies[$beverageName];
    }
}
