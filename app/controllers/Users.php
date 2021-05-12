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

        // Headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($data['users']);
    }

    public function login() {
        $this->view('users/login');
    }

    public function find() {
        
        // Headers
        $token = $this->random_str();
        $user = $this->userModel->fetchUser($this->data);
        
        // $user['token'] = $token;
        print_r(json_encode(array(
            'user'=>$user,
            'token'=>$token,
        )));
        // $data = [
        //     'user' => $user
        // ];
        // $_SESSION['id'] = $data['user']->id;
        // $_SESSION['username'] = $data['user']->username;
    }
    
    public function create() {
        
        print_r(json_encode($this->data));
        $this->userModel->store($this->data);
    }

    public function edit() {
        $user = $this->userModel->show($this->data);
        
        $data = [
            'user' => $user
        ];

        // Headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($data['user']);
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

    public function random_str(int $length = 64, string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}
