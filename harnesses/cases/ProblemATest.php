<?php

require_once 'PHPUnit/Framework/TestCase.php';
require_once '/tmp/testFile.php';

class ProgramOneTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
    * @test
    * @group one
    */
    public function testOne()
    {
        $h = new HelloWorld();
        $this->assertEquals("HELLO", strtoupper($h->sayHello()));
    }

    /**
    * @test
    */
    public function testTwo()
    {
        $h = new HelloWorld();
        $this->assertTrue(is_string($h->sayHello()));
    }
  
  /**
  * @test
  */
  public function passer()
  {
    $h = new HelloWorld();
    $this->assertTrue(true);
  }
}
