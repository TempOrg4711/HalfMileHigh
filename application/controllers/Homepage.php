<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * This class represents the homepage of our airport info site.
 * 
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Homepage extends Application
{
        /*
         * Function that takes in an array of values and dates, then
         * returns an array with dates and the number of occurences
         * of each date.
         */
        public function countForDates($array)
        {
          $countForDate = array();
          foreach ($array as $key=>$value) {
            if (isset($countForDate[$value->date])) {
              $countForDate[$value->date] += 1;
            } else {
              $countForDate[$value->date] = 1;
            }
          }

          $result = [];
          foreach ($countForDate as $key=>$value) {
            // Build date element per codeigniter format.
            $date = array('date'=>$key, 'count'=>$value);
            // Append date.
            $result[] = $date;
          }
          return $result;
        }


	public function index()
	{
            $this->data['pagebody'] = 'homepage';
            // pass on the data to present, including flights, dates of flights,
            // the size of hte fleet, the base airport, and destination airports
            $flightsrc = $this->flightsmdl->all();
            $this->data['flights'] = $flightsrc;
            $this->data['datearr'] = $this->countForDates($flightsrc);
            $this->data['sizeFleet'] = sizeof($this->fleetmdl->all());
            $this->data['baseAirport'] = $this->flightsmdl->getBaseApt();;
            $this->data['airports'] = $this->flightsmdl->getDestApt();
            $this->data['airportsFrom'] = $this->flightsmdl->getFromApt();

                    
            //display the page
            $this->render();
	}
}
