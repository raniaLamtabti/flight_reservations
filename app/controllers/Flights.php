<?php
class Flights extends Controller {
    public $data = [];

    public function __construct() {
        $this->flightModel = $this->model('Flight');
    }
    
    public function index() {
        $flights = $this->flightModel->read();
        $data = [
            'flights' => $flights
        ];
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        
        echo json_encode($data['flights']);
    }
    
    public function find() {
        $flights = $this->flightModel->find($this->data);
        if(!empty($this->data['dateTimeDepart'])){
            $flightsRout = $this->flightModel->findRout($this->data);
        }
        $data = [
            'flights' => $flights,
            'flightsRout' => $flightsRout
        ];
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        
        echo json_encode($data);
    }

    public function create() {
        $this->flightModel->store($this->data);
    }

    public function edit() {
        $flight = $this->flightModel->show($this->data);
        
        $data = [
            'flight' => $flight
        ];
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($data['flight']);
    }

    public function update() {
        $this->flightModel->update($this->data);
    }
    
    public function delete() {
        $this->flightModel->delete($this->data);
    }
}
