<?php
class Passengers extends Controller {
    public $data = [];

    public function __construct() {
        $this->passengerModel = $this->model('Passenger');
    }
    
    public function index() {
        $passengers = $this->passengerModel->read();
        $data = [
            'passengers' => $passengers
        ];
        $this->view('passengers/index', $data);
    }

    public function create() {
        $this->passengerModel->store($this->data);
        // $this->view('passengers/login');
    }

    public function edit() {
        $passenger = $this->passengerModel->show($this->data);
        
        $data = [
            'passenger' => $passenger
        ];
        $this->view('passengers/edit', $data);
    }

    public function update() {
        $this->passengerModel->update($this->data);
    }
    
    public function delete() {
        $this->passengerModel->delete($this->data);
    }
}
