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
        $this->assertEquals(0, $this->machine->getSupplies('Coffee'));
        $this->assertEquals(0, $this->machine->getSupplies('Chocolate'));
    }

    public function testMachineCanBeLoadedWithCoffeeSupplies()
    {
        $this->machine->loadSupplies('Coffee', 5);

        $this->assertEquals(5, $this->machine->getSupplies('Coffee'));
        $this->assertEquals(0, $this->machine->getSupplies('Chocolate'));
    }

    public function testMachineCanBeLoadedWithChocolateSupplies()
    {
        $this->machine->loadSupplies('Chocolate');

        $this->assertEquals(0, $this->machine->getSupplies('Coffee'));
        $this->assertEquals(10, $this->machine->getSupplies('Chocolate'));
    }
}
