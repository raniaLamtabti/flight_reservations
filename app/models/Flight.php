<?php
    class Flight {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        
        public function store($data) {
            $this->db->query('INSERT INTO flight (dateTimeDepart, dateTimeArrive, fromCountry, fromCity, toCountry, toCity, idUser) VALUES(:dateTimeDepart, :dateTimeArrive, :fromCountry, :fromCity, :toCountry, :toCity, :idUser)');
            //Bind values
            $this->db->bind(':dateTimeDepart', $data[0]['dateTimeDepart']);
            $this->db->bind(':dateTimeArrive', $data[0]['dateTimeArrive']);
            $this->db->bind(':fromCountry', $data[0]['fromCountry']);
            $this->db->bind(':fromCity', $data[0]['fromCity']);
            $this->db->bind(':toCountry', $data[0]['toCountry']);
            $this->db->bind(':toCity', $data[0]['toCity']);
            $this->db->bind(':idUser', '1');
            //Execute function
            try {
                $this->db->execute();
            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }

        public function update($data) {
            $this->db->query('UPDATE flight SET dateTimeDepart = :dateTimeDepart, dateTimeArrive = :dateTimeArrive, fromCountry = :fromCountry, fromCity = :fromCity, toCountry = :toCountry, toCity = :toCity WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
            $this->db->bind(':dateTimeDepart', $data[0]['dateTimeDepart']);
            $this->db->bind(':dateTimeArrive', $data[0]['dateTimeArrive']);
            $this->db->bind(':fromCountry', $data[0]['fromCountry']);
            $this->db->bind(':fromCity', $data[0]['fromCity']);
            $this->db->bind(':toCountry', $data[0]['toCountry']);
            $this->db->bind(':toCity', $data[0]['toCity']);
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function read() {
            $this->db->query('SELECT * FROM flight');
    
            //Execute function
            $flights = $this->db->resultSet();
            return $flights;
        }
        
        public function show($data) {
            $this->db->query('SELECT * FROM flight WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
    
            //Execute function
            $flight = $this->db->single();
            return $flight;
        }
        public function delete($data) {
            $this->db->query('DELETE FROM flight WHERE id = :id');
    
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
