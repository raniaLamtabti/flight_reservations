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
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($data['passengers']);
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
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($data['passenger']);
    }

    public function update() {
        $this->passengerModel->update($this->data);
    }
    
    public function delete() {
        $this->passengerModel->delete($this->data);
    }
}
