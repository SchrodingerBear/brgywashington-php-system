<?php 
class Indexs extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
    }

    public function index(){


        $data = [];


        $this->view('index', $data);
    }



}