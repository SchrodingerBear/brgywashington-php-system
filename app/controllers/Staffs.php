<?php 
class Admins extends Controller {
    public $session;
    public function __construct() {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
        $this->session = new Session;
    }

    public function index(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];




        $this->view('staffs/index', $data);
    }










}