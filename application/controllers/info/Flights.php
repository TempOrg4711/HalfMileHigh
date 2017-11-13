<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * This class acts as an enpoint returning all flight data in JSON format.
 *
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Flights extends CI_Controller
{
    /**
    * Flights endpoint page for the application exposing flights JSON data.
    *
    * Maps to the following URL
    * 		http://comp4711.local/info/flights
    */
    public function index()
    {
        //get all flights from flights model
        $flights = $this->flightsmdl->all();
        $this->data['pagebody'] = 'info/flights';
        $this->data['flights'] = json_encode($flights);
        $this->render();
    }

    /**
    * Render this page in JSON format
    */
    public function render()
    {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse('info/flights', $this->data);
    }
}
