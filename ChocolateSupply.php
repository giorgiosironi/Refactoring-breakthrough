<?php
class ChocolateSupply implements Supply {
    public function getBeverageName()
    {
        return 'Chocolate';
    }

    public function getQuantity()
    {
        return 10;
    }
}
