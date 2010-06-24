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

    private function assertSuppliesAre($number, $beverageName)
    {
        $this->assertEquals($number, $this->machine->getSupplies($beverageName));
    }
}
