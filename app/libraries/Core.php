<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){

      $url = $this->getUrl();

      if(!empty($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        $this->currentController = ucwords($url[0]);
        unset($url[0]);
      }

      require_once '../app/controllers/'. $this->currentController . '.php';
      $this->currentController = new $this->currentController;

      if(isset($url[1])){
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          unset($url[1]);
        }
      }
      // $this->params = $_POST ? $_POST : [];
      $this->currentController->data=json_decode(file_get_contents("php://input"),true);
      // print_r(json_decode(file_get_contents("php://input")));
      // array_push($this->currentController->data, json_decode(file_get_contents("php://input")));
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }

  // array(2) {
  //   [0]=> object(stdClass){
  //     ["firstName"]=>
  //     string(5) "rania"
  //     ["lastName"]=>
  //     string(8) "lamtabti"
  //     ["dateBirth"]=>
  //     string(10) "1995-05-05"
  //     ["username"]=>
  //     string(5) "rania"
  //     ["loginPassword"]=>
  //     string(5) "12345"
  //     ["role"]=>
  //     string(5) "admin"
  //   }
  //   [1]=>object(stdClass){
  //     ["firstName"]=>
  //     string(5) "rania"
  //     ["lastName"]=>
  //     string(8) "lamtabti"
  //     ["dateBirth"]=>
  //     string(10) "1995-05-05"
  //     ["username"]=>
  //     string(5) "rania"
  //     ["loginPassword"]=>
  //     string(5) "12345"
  //     ["role"]=>
  //     string(5) "admin"
  //   }
  //   }