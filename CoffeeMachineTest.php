<?php
require_once 'Supply.php';
require_once 'CoffeeSupply.php';
require_once 'ChocolateSupply.php';
require_once 'CoffeeMachine.php';

class CoffeeMachineTest extends PHPUnit_Framework_TestCase
{
    private $machine;

    public function setUp()
    {
        $this->machine = new CoffeeMachine(array('Coffee', 'Chocolate'));
    }

    public function testMachineIsLoadedWithZeroSuppliesAtCreation()
    {
        $this->assertSuppliesAre(0, 'Coffee');
        $this->assertSuppliesAre(0, 'Chocolate');
    }

    public function testMachineCanBeLoadedWithCoffeeSupplies()
    {
        $this->machine->loadSupplies(new CoffeeSupply(5));

        $this->assertSuppliesAre(5, 'Coffee');
        $this->assertSuppliesAre(0, 'Chocolate');
    }

    public function testMachineCanBeLoadedWithChocolateSupplies()
    {
        $this->machine->loadSupplies(new ChocolateSupply);

        $this->assertSuppliesAre(0, 'Coffee');
        $this->assertSuppliesAre(10, 'Chocolate');
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

    private function assertSuppliesAre($number, $beverageName)
    {
        $this->assertEquals($number, $this->machine->getSupplies($beverageName));
    }
}
