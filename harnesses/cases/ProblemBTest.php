<?php

require_once 'PHPUnit/Framework/TestCase.php';
require_once '/tmp/testFile.php';
/**
  * @group shuffle
  */

class ProgramTwoTest extends PHPUnit_Framework_TestCase
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
    */
    public function shuffleMe()
    {
            $maxLen = 52;
            $origDeck = array();
            for($i=0; $i<$maxLen; $i++) {
                    $origDeck[] = $i;
            }

            $d = new Deck();
            $ret = $d->shuffle($origDeck);
            $this->assertTrue(is_array($ret), "Return is not an Array");
            //$this->assertNotEquals($origDeck, $ret);
            $this->assertTrue(count($ret) == $maxLen, "Return Value is not the same Size of original Deck");
            for ($i=0; $i<= $maxLen; $i++) {
                    //echo "Orig: {$origDeck[$i]} -- returned: {$ret[$i]}\n";
                    if($ret[$i] == $origDeck[$i]) {
                        $this->fail("Decks are not different");
                        return;
                    }
            }
    }

    /**
     * @test
    */
    public function shuffleMeII()
    {
            $maxLen = 123;
            $origDeck = array();
            for($i=0; $i<$maxLen; $i++) {
                    $origDeck[] = $i;
            }

            $d = new Deck();
            $ret = $d->shuffle($origDeck);
            $this->assertTrue(is_array($ret), "Return is not an Array");
            //$this->assertNotEquals($origDeck, $ret);
            $this->assertTrue(count($ret) == $maxLen, "Return Value is not the same Size of original Deck");
            for ($i=0; $i<= $maxLen; $i++) {
                    //echo "Orig: {$origDeck[$i]} -- returned: {$ret[$i]}\n";
                    if($ret[$i] == $origDeck[$i]) {
                        $this->fail("Decks are not different");
                        return;
                    }
            }
    }

    /**
     * @test
    */
    public function shuffleMeIII()
    {
            $maxLen = 1252;
            $origDeck = array();
            for($i=0; $i<$maxLen; $i++) {
                    $origDeck[] = $i;
            }

            $d = new Deck();
            $ret = $d->shuffle($origDeck);
            $this->assertTrue(is_array($ret), "Return is not an Array");
            //$this->assertNotEquals($origDeck, $ret);
            $this->assertTrue(count($ret) == $maxLen, "Return Value is not the same Size of original Deck");
            for ($i=0; $i<= $maxLen; $i++) {
                    //echo "Orig: {$origDeck[$i]} -- returned: {$ret[$i]}\n";
                    if($ret[$i] == $origDeck[$i]) {
                        $this->fail("Decks are not different");
                        return;
                    }
            }
    }
}
