<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function fetchUser($data) {
            $this->db->query("SELECT * FROM user WHERE username = :username AND loginPassword = :password");

            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);

            $user = $this->db->single();
            // if($user){
            //     $user->token = $token;
            // }

            return $user;
        }

        public function store($data) {
            // echo sizeof($data);
            $this->db->query('INSERT INTO user (firstName, lastName, dateBirth, username, loginPassword, role) VALUES(:firstName, :lastName, :dateBirth, :username, :loginPassword, :role)');
            //Bind values
            $this->db->bind(':firstName', $data['firstName']);
            $this->db->bind(':lastName', $data['lastName']);
            $this->db->bind(':dateBirth', $data['dateBirth']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':loginPassword', $data['password']);
            $this->db->bind(':role', $data['role']);
    
            //Execute function
            try {
                $this->db->execute();
            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }

        public function update($data) {
            $this->db->query('UPDATE user SET firstName = :firstName, lastName = :lastName, dateBirth = :dateBirth, username = :username, loginPassword = :loginPassword WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
            $this->db->bind(':firstName', $data[0]['firstName']);
            $this->db->bind(':lastName', $data[0]['lastName']);
            $this->db->bind(':dateBirth', $data[0]['dateBirth']);
            $this->db->bind(':username', $data[0]['username']);
            $this->db->bind(':loginPassword', $data[0]['loginPassword']);
            // $this->db->bind(':role', $data['role']);
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function read() {
            $this->db->query('SELECT * FROM user');
    
            //Execute function
            $users = $this->db->resultSet();
            return $users;
        }
        
        public function show($data) {
            $this->db->query('SELECT * FROM user WHERE id = :id');
    
            //Bind values
            $this->db->bind(':id', $data[0]['id']);
    
            //Execute function
            $user = $this->db->single();
            return $user;
        }
        public function delete($data) {
            $this->db->query('DELETE FROM user WHERE id = :id');
    
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
