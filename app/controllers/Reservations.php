<?php
class Reservations extends Controller {
    public $data = [];

    public function __construct() {
        $this->reservationModel = $this->model('Reservation');
    }
    
    public function index() {
        $reservations = $this->reservationModel->read();
        $data = [
            'reservations' => $reservations
        ];
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($data['reservations']);
    }

    public function create() {
        $this->reservationModel->store($this->data);
        // $this->view('reservations/login');
    }

    public function edit() {
        $reservation = $this->reservationModel->show($this->data);
        
        $data = [
            'reservation' => $reservation
        ];
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($data['reservation']);
    }

    public function update() {
        $this->reservationModel->update($this->data);
    }
    
    public function delete() {
        $this->reservationModel->delete($this->data);
    }
}
