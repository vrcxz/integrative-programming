<?php
use drmonkeyninja\Average;
use PHPUnit\Framework\TestCase;

class AverageTest extends TestCase
{
  public function testCalculationOfMean()
  {
    $numbers = [3, 7, 6, 1, 5];
    $Average = new \Average();
    $this->assertEquals(4.4, $Average->mean($numbers));
  }
}