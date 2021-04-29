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
        $this->view('flights/index', $data);
    }

    public function create() {
        $this->flightModel->store($this->data);
        // $this->view('flights/login');
    }

    public function edit() {
        $flight = $this->flightModel->show($this->data);
        
        $data = [
            'flight' => $flight
        ];
        $this->view('flights/edit', $data);
    }

    public function update() {
        $this->flightModel->update($this->data);
    }
    
    public function delete() {
        $this->flightModel->delete($this->data);
    }
}
