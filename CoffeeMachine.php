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
        if ($beverageName == "Chocolate") {
            if ($quantity === null) {
                return 10;
            }
        }

        if ($beverageName == "Coffee") {
            if ($quantity === null) {
                throw new InvalidArgumentException("Coffee supplies number must be defined.");
            }
            if ($quantity % 5 != 0) {
                throw new InvalidArgumentException("Coffee supplies must come in multiples of 5.");
            }
        }
        return $quantity;
    }

    public function getSupplies($beverageName)
    {
        return $this->supplies[$beverageName];
    }
}
