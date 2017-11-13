<?php
include('Entity.php');

/**
 *  Incomplete!
 *  Need some logic for validations eg. regexp.
 * 
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Flight extends Entity {
    private $id;            // holds flight id
    private $depart_from;   // holds flight departure location
    private $arrive_to;     // holds flight arrival location
    private $distance;      // holds distance from departure location to arrival location
    private $date;          // holds date of a flight
    private $accode;        // holds aircraft code

    /**
     * Setter for flight id
     * @param string $id
     */
    public function setId($id) {
      $this->id = $id;
    }
  
    /**
     * Getter for flight id
     * @return string $id
     */
    public function getId() {
      return $this->id;
    }
  
    /**
     * Setter for flight departure location
     * @param string $from
     */
    public function setDepartLocation($from) {
      $this->depart_from = $from;
    }
  
    /**
     * Getter for flight departure location
     * @return string $depart_from
     */
    public function getDepartLocation() {
      return $this->depart_from;
    }
  
    /**
     * Setter for flight arrival location
     * @param string $to
     */
    public function setArrivalLocation($to) {
      $this->arrive_to = $to;
    }
  
    /**
     * Getter for flight arrival location
     * @return string $arrive_to
     */
    public function getArrivalLocation() {
      return $this->arrive_to;
    }

    /**
     * Setter for distance from departure to arrival 
     * @param int $distance     */
    public function setDistance($distance) {
      $this->distance = $distance;
    }

    /**
     * Getter for distance from departure to arrival
     * @return string $distance
     */
    public function getDistance() {
      return $this->distance;
    }

    /**
     * Setter for flight date
     * @param string $date
     */
    public function setDate($date) {
      $this->date = $date;
    }
  
    /**
     * Getter for flight date
     * @return string $accode
     */
    public function getDate() {
      return $this->date;
    }

    /**
     * Setter for unique aircarft code
     * @param string $accode
     */
    public function setAccode($accode) {
      $this->accode = $accode;
    }
  
    /**
     * Getter for unique aircarft code
     * @return string $accode
     */
    public function getAccode() {
      return $this->accode;
    }
}