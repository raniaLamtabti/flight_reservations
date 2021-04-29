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
        $this->view('reservations/index', $data);
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
        $this->view('reservations/edit', $data);
    }

    public function update() {
        $this->reservationModel->update($this->data);
    }
    
    public function delete() {
        $this->reservationModel->delete($this->data);
    }
}
