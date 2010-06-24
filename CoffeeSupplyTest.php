<?php
require_once 'Supply.php';
require_once 'CoffeeSupply.php';

class CoffeeSupplyTest extends PHPUnit_Framework_TestCase
{
    public function testCoffeeSupplyReturnsTheBeverageNameCorrectly()
    {
        $supply = new CoffeeSupply(5);

        $this->assertEquals('Coffee', $supply->getBeverageName());
    }

    public function testCoffeeSuppliesCanBeCreatedWithASpecificQuantity()
    {
        $supply = new CoffeeSupply(5);

        $this->assertEquals(5, $supply->getQuantity());
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testCoffeeSuppliesMustBeExplicitlyNumbered()
    {
        new CoffeeSupply;
    }

    public static function invalidCoffeeSuppliesNumber()
    {
        return array(
            array(1),
            array(2),
            array(3),
            array(4),
            array(6), 
            array(7), 
            array(8), 
            array(9), 
            array(11)
        );
    }

    /**
     * @dataProvider invalidCoffeeSuppliesNumber
     * @expectedException InvalidArgumentException
     */
    public function testCoffeeSuppliesMustComeInMultiplesOfFive($number)
    {
        new CoffeeSupply($number);
    }
}
