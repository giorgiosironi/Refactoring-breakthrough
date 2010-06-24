<?php
class CoffeeSupply implements Supply {
    private $quantity;

    public function __construct($quantity)
    {
        $this->quantity = $this->checkQuantity($quantity);
    }

    private function checkQuantity($quantity)
    {
        if ($quantity === null) {
            throw new InvalidArgumentException("Coffee supplies number must be defined.");
        }
        if ($quantity % 5 != 0) {
            throw new InvalidArgumentException("Coffee supplies must come in multiples of 5.");
        }
        return $quantity;
    }

    public function getBeverageName()
    {
        return 'Coffee';
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
