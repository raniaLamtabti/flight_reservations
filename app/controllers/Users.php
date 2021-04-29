<?php
class Users extends Controller {
    public $data = [];

    public function __construct() {
        $this->userModel = $this->model('User');
    }
    
    public function index() {
        $users = $this->userModel->read();
        $data = [
            'users' => $users
        ];
        $this->view('users/read', $data);
    }

    public function login() {
        $this->view('users/login');
    }

    public function find() {
        $user = $this->userModel->fetchUser($this->data);
        $data = [
            'user' => $user
        ];
        $_SESSION['id'] = $data['user']->id;
        $_SESSION['username'] = $data['user']->username;

        if($data['user']->role == 'admin'){
            $this->view('dashboard/adminHome', $data);
        }else{
            $this->view('dashboard/clientHome', $data);
        }
    }
    
    public function create() {
        print_r($this->data);
        $this->userModel->store($this->data);
        $this->view('users/login');
    }

    public function edit() {
        $user = $this->userModel->show($this->data);
        
        $data = [
            'user' => $user
        ];
        $this->view('users/edit', $data);
    }

    public function update() {
        $this->userModel->update($this->data);
    }

    
    public function delete() {
        $this->userModel->delete($this->data);
    }

    public function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        header('location:' . URLROOT . '/users/login');
    }
}
