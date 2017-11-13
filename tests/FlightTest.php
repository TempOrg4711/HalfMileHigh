<?php

use PHPUnit\Framework\TestCase;

require_once(APPPATH.'models/Flight.php');

class FlightTest extends TestCase
{
    private $CI;

    public function setUp()
    {
        $this->CI = &get_instance();
    }

    public function testInvalidDepartureTime() {
        $flight = new Flight();
        $this->expectException(Exception::class);
        $flight->setDepartureTime(2500);
    }

    public function testInvalidDepartureAirport() {
        $flight = new Flight();
        $this->expectException(Exception::class);
        $flight->setDepartLocation("6666 d");
    }

    public function testValidArrivalAirport() {
        $flight = new Flight();
        $flight->setArrivalLocation('XQU');
        $this->assertEquals($validCode, $flight->$arrive_to);
    }

    public function testValidDepartureAirport() {
        $flight = new Flight();
        $flight->setDepartLocation('XQU');
        $this->assertEquals($validCode, $flight->$depart_from);
    }

    public function testValidArrivalTime() {
        $flight = new Flight();
        $flight->setArrivalTime(1500);
        $this->assertEquals(1500, 1500);
    }

    public function testValidDepartureTime() {
        $flight = new Flight();
        $flight->setDepartureTime(1500);
        $this->assertEquals(1500, 1500);
    }

    public function testInvalidArrivalTime() {
        $flight = new Flight();
        $this->expectException(Exception::class);
        $flight->setArrivalTime(-200);
    }
}
