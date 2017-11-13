<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * This class represents an information flights page on our airport info site.
 *
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Flights extends Application
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://comp4711.local/flights
     */

    public function index()
    {
        //validate current role & generate content accordingly
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_OWNER) {
            $this->data['modebutton'] = '<a href="/roles/actor/Guest" class="btn btn-info" role="button">Mode: Admin</a>';
            $this->data['modebutton'] .= $this->parser->parse('addflight', [], true);
            $this->data['pagebody'] = 'flightsadmin';
        } else {
            $this->data['modebutton'] = '<a href="/roles/actor/Owner" class="btn btn-info" role="button">Mode: User</a>';
            $this->data['pagebody'] = 'flights';
        }
        $this->data['flights'] = $this->flightsmdl->all();
        $this->render();
    }

    public function add()
    {
        $flight = $this->flightsmdl->__construct();
        $this->session->set_userdata('flight', $flight);
        $this->showit();
    }

    public function edit($id = null)
    {
        if ($id == null) {
            redirect('/flights');
        }
        $flight = $this->flightsmdl->get($id);
        $this->session->set_userdata('flight', $flight);
        $this->showit();
    }

    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
        $flight = (array)$this->session->userdata('flight');
        $this->session->set_userdata('flight', $flight);
        $this->data['id'] = $flight['id'];

        // if no errors, pass an empty message
        if (! isset($this->data['error'])) {
            $this->data['error'] = '';
        }

        $fields = array(
            'fid'      => form_label('Id') . form_input('id', $flight['id']),
            'ffrom'      => form_label('From') . form_input('from', $flight['from']),
            'fto'      => form_label('To') . form_input('to', $flight['to']),
            'fdistance'      => form_label('Distance') . form_input('distance', $flight['distance']),
            'fdate'      => form_label('Date') . form_input('date', $flight['date']),
            'fdeparture'      => form_label('Departure') . form_input('departure', $flight['departure']),
            'farrival'      => form_label('Arrival') . form_input('arrival', $flight['arrival']),
            'faccode'      => form_label('Aircraft Code') . form_input('accode', $flight['accode']),
            'zsubmit'    => form_submit('submit', 'Update Flight'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'flightedit';
        $this->render();
    }

    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->flightsmdl->rules());
      
        // retrieve & update data transfer buffer
        $flight = (array) $this->session->userdata('flight');
        $flight = array_merge($flight, $this->input->post());
        $flight = (object) $flight;  // convert back to object
        $this->session->set_userdata('flight', (object) $flight);

        // validate away
        if ($this->form_validation->run()) {
            $this->alert('Flight ' . $flight->id . ' updated successfully.', 'success');
            $this->flightsmdl->update($flight);
        } else {
            $this->alert('<strong>Validation errors, see below: <strong><br>' . validation_errors(), 'danger');
        }

        $this->session->set_userdata('flight', $flight);
        $this->showit();
    }

    // build a suitable error mesage
    public function alert($message)
    {
        $this->load->helper('html');
        $this->data['error'] = heading($message, 3);
    }

    // Forget about this edit
    public function cancel()
    {
        $this->session->unset_userdata('flight');
        redirect('/flights');
    }

    // Delete this item altogether
    public function delete()
    {
        print_r($this->session->userdata());
        $dto = $this->session->userdata('flight');
        $flight = $this->flightsmdl->get($dto['accode']);
        $this->flightsmdl->delete($flight['accode']);
        $this->session->unset_userdata('flight');
        redirect('/flights');
    }
    
    public function schedule() {
        echo "        
            <link rel='stylesheet' type='text/css' media='all' href='../../../../../css/reset.css' />
        <link rel='stylesheet' type='text/css' media='all' href='../../../../../css/text.css' />
        <link rel='stylesheet' type='text/css' media='all' href='../../../../../css/style.css' />
        <link rel='stylesheet' type='text/css' media='all' href='../../../../../css/lightbox.css' />
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bttn.css/0.2.4/bttn.css' />
        
        <div style = 'margin:auto; width:80%;'>
        ";

        echo "<h3> Travel routes from ". $_POST["fromdrop"]." to ".$_POST["todrop"] . ".</h3>";
        
        $this->getFlights($_POST["fromdrop"],$_POST["todrop"]);
        
        echo "<br/><br/><a href= '../'><button onclick='goBack()'>Go back</button></a> </div>";
    }
    
    
    public function getFlights($from, $to) {
        //array of linked lists/dicts (first/second/third)
        $result;
        $midpoints = [];
        
        //bools
        $addtomidpoint = false;
        $destinationmatch = false;
        
        $this->load->helper('form');
        
        $flightsarr = (array)$this->flightsmdl->all();

        
        foreach ($flightsarr as $flight) {
            //echo "comparing: " . $flight->from . " with " . $from . " and  comparing" . $flight->to . " with ".$to; 
            if ($flight->from==$from && $flight->to==$to) {
                //echo "MATCHES  : PUSHING : " . $flight->id;
                array_push($midpoints, $flight->id);
            }
        }
        
        if (sizeof($midpoints) == 0) {
            echo "No matches found for your selection, sorry!";
            return;
        }
        
        echo "
            <table class='table'>
                <tr>
                    <th>
                        Aircraft Code
                    </th>
                    <th>
                        From
                    </th>
                    <th>
                        To
                    </th>
                    <th>
                        Departure
                    </th>
                    <th>
                        Arrival
                    </th>        
                    <th>
                        Distance
                    </th>
                </tr>";
        
        
        foreach ($midpoints as $key => $value) { 
            $data = $this->flightsmdl->getFlight($value);
        
        echo        "
                <tr>
                    <td>
                        <a style='text-decoration: none; color:black;' ref='#' title='The aircraft code is a unique identifier for the aircraft involved in a flight.'>
                        " . $data["accode"] . "
                        </a>
                    </td>
                    <td>
                        " . $data["from"] . "
                    </td>
                    <td>
                        " . $data["to"] . "
                    </td>
                    <td>
                        " . $data["departure"] . "
                    </td>
                    <td>
                        " . $data["arrival"] . "
                    </td>
                    <td>
                        " . $data["distance"] . "
                    </td>
                </tr>";
        }

        echo "</table>";
        
        return $result = $midpoints;
    }

}
