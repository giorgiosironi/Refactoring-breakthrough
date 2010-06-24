<?php
require_once 'Supply.php';
require_once 'ChocolateSupply.php';

class ChocolateSupplyTest extends PHPUnit_Framework_TestCase
{
    private $supply;

    public function setUp()
    {
        $this->supply = new ChocolateSupply;
    }

    public function testChocolateSupplyReturnsTheBeverageNameCorrectly()
    {
        $this->assertEquals('Chocolate', $this->supply->getBeverageName());
    }

    public function testMachineCanBeLoadedWithChocolateSupplies()
    {
        $this->assertEquals(10, $this->supply->getQuantity());
    }
}
