<?php
    class Reservation {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        
        public function store($data) {
            $this->db->query('INSERT INTO reservation (idPassenger, idFlight, code, seatNumber) VALUES(:idPassenger, :idFlight, :code, :seatNumber)');
            //Bind values
            $this->db->bind(':idPassenger', $data[0]['idPassenger']);
            $this->db->bind(':idFlight', $data[0]['idFlight']);
            $this->db->bind(':code', $data[0]['code']);
            $this->db->bind(':seatNumber', $data[0]['seatNumber']);
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function update($data) {
            $this->db->query('UPDATE reservation SET idPassenger = :idPassenger, idFlight = :idFlight, code = :code, seatNumber = :seatNumber WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
            $this->db->bind(':idPassenger', $data[0]['idPassenger']);
            $this->db->bind(':idFlight', $data[0]['idFlight']);
            $this->db->bind(':code', $data[0]['code']);
            $this->db->bind(':seatNumber', $data[0]['seatNumber']);
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function read() {
            $this->db->query('SELECT * FROM reservation');
    
            //Execute function
            $reservations = $this->db->resultSet();
            return $reservations;
        }
        
        public function show($data) {
            $this->db->query('SELECT * FROM reservation WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
    
            //Execute function
            $reservation = $this->db->single();
            return $reservation;
        }
        public function delete($data) {
            $this->db->query('DELETE FROM reservation WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
