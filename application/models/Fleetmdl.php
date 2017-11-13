<?php

require_once(APPPATH . 'models/Wacky.php');

/**
 * This is a fleet model that stores information about the airplanes available
 * to Dove Airlines, including their id, make, model, price, # seats, reach,
 * cruise speed, takeoff speed, and hourly cost to operate.
 *
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Fleetmdl extends CSV_Model
{
    public $data;

    public function __construct()
    {
        parent::__construct(APPPATH . '/data/fleet.csv', 'key');

        $this->data = $this->all();
    }

    /**
     * Returns a single plane by id.
     */
    public function get($id, $key2 = null)
    {
        $wackyServer = new Wacky();
				$fullPlane = $wackyServer->getAirplane($id);
				return $fullPlane;
    }

    // provide form validation rules
    public function rules()
    {
        $config = array(
                ['field' => 'id', 'label' => 'id', 'rules' => 'alpha_numeric_spaces|max_length[4]'],
                ['field' => 'make', 'label' => 'make', 'rules' => 'alpha_numeric_spaces|max_length[12]'],
                ['field' => 'model', 'label' => 'model', 'rules' => 'alpha_numeric_spaces|max_length[12]'],
                ['field' => 'price', 'label' => 'price', 'rules' => 'integer|less_than[6]'],
                ['field' => 'seats', 'label' => 'seats', 'rules' => 'integer|less_than[4]'],
                ['field' => 'reach', 'label' => 'reach', 'rules' => 'integer|less_than[10]'],
                ['field' => 'cruise', 'label' => 'cruise', 'rules' => 'integer|less_than[10]'],
                ['field' => 'takeoff', 'label' => 'takeoff', 'rules' => 'integer|less_than[6]'],
                ['field' => 'hourly', 'label' => 'hourly', 'rules' => 'integer|less_than[6]'],
            );
        return $config;
    }
}
