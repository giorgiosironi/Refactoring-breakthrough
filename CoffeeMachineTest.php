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
}
