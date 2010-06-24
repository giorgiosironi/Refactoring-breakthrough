<?php
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
        $this->machine->loadSupplies('Coffee', 5);

        $this->assertSuppliesAre(5, 'Coffee');
        $this->assertSuppliesAre(0, 'Chocolate');
    }

    public function testMachineCanBeLoadedWithChocolateSupplies()
    {
        $this->machine->loadSupplies('Chocolate');

        $this->assertSuppliesAre(0, 'Coffee');
        $this->assertSuppliesAre(10, 'Chocolate');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCoffeeSuppliesMustBeExplicitlyNumbered()
    {
        $this->machine->loadSupplies('Coffee');
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
        $this->machine->loadSupplies('Coffee', $number);
    }

    private function assertSuppliesAre($number, $beverageName)
    {
        $this->assertEquals($number, $this->machine->getSupplies($beverageName));
    }
}
