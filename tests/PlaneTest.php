<?php
use PHPUnit\Framework\TestCase;

require_once(APPPATH.'models/Plane.php');

class PlaneTest extends TestCase
{
    private $CI;

    public function setUp()
    {
        $this->CI = &get_instance();
    }

    public function testCorrectId() {
        $plane = new Plane();
        $plane->setId("kitten");
        $this->assertEquals("kitten", $plane->getId());
    }

    public function testEmpty() {
        $plane = new Plane();
        $this->expectException(Exception::class);
        $plane->setId("");
    }

    public function testCharacters() {
        $plane = new Plane();
        $this->expectException(Exception::class);
        $plane->setId("*&^");
    }
}
