<?php
    class Passenger {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        
        public function store($data) {
            sizeof($data);
            foreach($data as $user){
                $this->db->query('INSERT INTO passenger (firstName, lastName, email, dateBirth, idUser) VALUES(:firstName, :lastName, :email, :dateBirth, :idUser)');
                //Bind values
                $this->db->bind(':firstName', $user['firstName']);
                $this->db->bind(':lastName', $user['lastName']);
                $this->db->bind(':email', $user['email']);
                $this->db->bind(':dateBirth', $user['dateBirth']);
                $this->db->bind(':idUser', '1');
                //Execute function
                try {
                    $this->db->execute();
                } catch(PDOException $e) {
                    return $e->getMessage();
                }
            }
        }

        public function update($data) {
            $this->db->query('UPDATE passenger SET firstName = :firstName, lastName = :lastName, email = :email, dateBirth = :dateBirth WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
            $this->db->bind(':firstName', $data[0]['firstName']);
            $this->db->bind(':lastName', $data[0]['lastName']);
            $this->db->bind(':email', $data[0]['email']);
            $this->db->bind(':dateBirth', $data[0]['dateBirth']);
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function read() {
            $this->db->query('SELECT * FROM passenger');
    
            //Execute function
            $passengers = $this->db->resultSet();
            return $passengers;
        }
        
        public function show($data) {
            $this->db->query('SELECT * FROM passenger WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
    
            //Execute function
            $passenger = $this->db->single();
            return $passenger;
        }
        public function delete($data) {
            $this->db->query('DELETE FROM passenger WHERE id = :id');
    
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
