<?php 
class Accounts extends Controller {
    public $session;
    public function __construct() {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
        $this->accountModel = $this->model('Account');
        $this->session = new Session;
    }



    public function index() {
        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }


        $data = [
            'title' => 'Home page',
        ];

        $accountsToVerify = $this->accountModel->findAllAccountToVerify();

        $data = [
            'accountsToVerify' => $accountsToVerify
        ];

        if(isset($_POST['btnApprove'])){
            $data = [
                'id' => $_POST['id'],
                'status' => 'Verified'
            ];

            if($this->accountModel->updateAccountStatus($data)){
                $this->session->setFlash('status', 'Account Approved!');
                $this->session->setFlash('status_icon', 'success');
                header("Location: " .URLROOT . "/accounts/index");
            }
        }

        if(isset($_POST['btnDisapprove'])){
            $data = [
                'id' => $_POST['id'],
                'status' => 'not verified'
            ];

            if($this->accountModel->updateAccountStatus($data)){
                $this->session->setFlash('status', 'Account Disapproved!');
                $this->session->setFlash('status_icon', 'error');
                header("Location: " .URLROOT . "/accounts/index");
            }
        }


        $this->view('accounts/index', $data);
    }

    public function view_account($id = ''){

    

        $data = [
            'id' => $id
        ];
        $myDetails = $this->userModel->getUserDetailsById($data);


        echo json_encode($myDetails);
    }


    public function verified() {
        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }


        $data = [
            'title' => 'Home page',
        ];

        $accountsVerified = $this->accountModel->findAllAccountVerified();



        if(isset($_POST['btnSave'])){
            $data = [

                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'accountType' => $_POST['accountType']
            ];

            if(empty($data['password'])){
                if($this->accountModel->updateAccountRole($data)){
                    $this->session->setFlash('status', 'Update successfuly!');
                    $this->session->setFlash('status_icon', 'success');
                   
                    header("Location: " .URLROOT . "/accounts/verified");
                }else {
                    $this->session->setFlash('status', 'Update Error!');
                    $this->session->setFlash('status_icon', 'error');
                    header("Location: " .URLROOT . "/accounts/verified");
                }
            }
            if($data['password']){
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                if($this->accountModel->updateAccountPassword($data) AND $this->accountModel->updateAccountRole($data)){
                    $this->session->setFlash('status', 'Update successfuly!');
                    $this->session->setFlash('status_icon', 'success');
                    header("Location: " .URLROOT . "/accounts/verified");
                }else {
                    $this->session->setFlash('status', 'Update Error!');
                    $this->session->setFlash('status_icon', 'error');
                    header("Location: " .URLROOT . "/accounts/verified");
                }

            }



        }

        $data = [
            'accountsVerified' => $accountsVerified
        ];




        $this->view('accounts/verified', $data);
    }






}