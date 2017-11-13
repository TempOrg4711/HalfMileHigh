<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * This class acts as an enpoint returning all fleet data in JSON format.
 *
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Fleet extends CI_Controller
{
    /**
    * Fleet endpoint page for the application exposing flights JSON data.
    *
    * Maps to the following URL
    * 		http://comp4711.local/info/flights
    */
    public function index()
    {
        //get all planes in our fleet model
        $fleet = $this->fleetmdl->all();
        $this->data['pagebody'] = 'info/fleet';
        $this->data['fleet'] = json_encode($fleet);
        $this->render();
    }

    /**
     * Render this page in JSON format
     */
    public function render()
    {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse('info/fleet', $this->data);
    }
}
