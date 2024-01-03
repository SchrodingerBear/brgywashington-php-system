<?php 
class Certificates extends Controller {
    public $session;
    public function __construct() {
        $this->certificateModel = $this->model('Certificate');
        $this->adminModel = $this->model('Admin');
        $this->session = new Session;
    }

    public function index() {

        $certificates = $this->certificateModel->findAllWalkInCertificate();

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'certificates' => $certificates,
            'title' => 'Certification',
            
        ];

        $this->view('certificates/index', $data);
    }



    public function modalIndigency() {

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'last_name' => '',
            'first_name' => '',
            'middle_name' => '',
            'suffix' => '',
            'contact_number' => '',
            'form_type' => '',
            'purpose' => '',
            'qty' => '',
            

            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'last_name' => trim($_POST['lastName']),
                'first_name' => trim($_POST['firstName']),
                'middle_name' => trim($_POST['middleName']),
                'suffix' => trim($_POST['suffix']),
                'contact_number' => trim($_POST['contactNum']),
                'form_type' => trim($_POST['formType']),
                'purpose' => trim($_POST['purpose']),
                'qty' => trim($_POST['qty']),
                'table_name' => 'indigency'
                
            ];

            
            // Add the data to indigency table
            if($this->certificateModel->addIndigency($data)) {
                // getFormId - get the id of indigency and set it to $formId
                $formId = $this->certificateModel->getFormId($data)->id;

                if($_SESSION['account_type'] != 1){
                    $tableType = 'request';
                }else{
                    $tableType = 'walk_in';
                }

                $data = [
                    'form_type' => trim($_POST['formType']),
                    'purpose' => trim($_POST['purpose']),
                    'qty' => trim($_POST['qty']),
                    'form_type' => 'Barangay Indigency',
                    'formId' => $formId,
                    'table_name' => $tableType
                ];
                    // Add the data to walk_in table
                    if($this->certificateModel->addCertificate($data)){
                
                    // get the id of walk_in and set it to $formId
                    $formId = $this->certificateModel->getFormId($data)->id;

                    $data = [
                        'table_name' => 'indigency',
                        'formId' => $formId
                    ];

                    if($this->certificateModel->addIdControl($data)){

                        $lastId = $this->certificateModel->getLastId($data);


                        if($_SESSION['account_type'] != 1){
                            header("Location: " .URLROOT . "/users");
                        }else{
                            header("Location: " .URLROOT . "/certificates/generate_indigency/$lastId->control");
                        }

                    }  
                }
            }else {
                die("Something went wrong, please try again!");
            }            

        }
    }


    public function modalPermit() {

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'last_name' => '',
            'first_name' => '',
            'middle_name' => '',
            'suffix' => '',
            'contact_number' => '',
            'form_type' => '',
            'business_name' => '',
            'oper_lastName' => '',
            'oper_firstName' => '',
            'oper_middleName' => '',
            'oper_suffix' => '',
            'purpose' => '',
            'qty' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'last_name' => trim($_POST['lastName']),
                'first_name' => trim($_POST['firstName']),
                'middle_name' => trim($_POST['middleName']),
                'suffix' => trim($_POST['suffix']),
                'contact_number' => trim($_POST['contactNum']),
                'form_type' => trim($_POST['formType']),
                'business_name' => trim($_POST['businessName']),
                'oper_lastname' => trim($_POST['operLastName']),
                'oper_firstname' => trim($_POST['operFirstName']),
                'oper_middlename' => trim($_POST['operMiddleName']),
                'oper_suffix' => trim($_POST['operSuffix']),
                'purpose' => trim($_POST['purpose']),
                'qty' => trim($_POST['qty']),
                'table_name' => 'permit'
                
            ];
            // Add the data to indigency table
            if($this->certificateModel->addPermit($data)) {
                // getFormId - get the id of permit and set it to $formId
                $formId = $this->certificateModel->getFormId($data)->id;

                if($_SESSION['account_type'] != 1){
                    $tableType = 'request';
                }else{
                    $tableType = 'walk_in';
                }

                $data = [
                    'form_type' => trim($_POST['formType']),
                    'purpose' => trim($_POST['purpose']),
                    'qty' => trim($_POST['qty']),
                    'form_type' => 'Barangay Permit',
                    'formId' => $formId,
                    'table_name' => $tableType
                ];
                // Add the data to walk_in table
                if($this->certificateModel->addCertificate($data)){

                    // get the id of walk_in and set it to $formId
                    $formId = $this->certificateModel->getFormId($data)->id;

                    $data = [
                        'table_name' => 'permit',
                        'formId' => $formId
                    ];

                    if($this->certificateModel->addIdControl($data)){

                        $lastId = $this->certificateModel->getLastId($data);

                        if($_SESSION['account_type'] != 1){
                            header("Location: " .URLROOT . "/users");
                        }else{
                            header("Location: " .URLROOT . "/certificates/generate_permit/$lastId->control");
                        }

                    }  
                }
            }else {
                die("Something went wrong, please try again!");
            }
            

        }
    }

    public function modalResidency() {

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'last_name' => '',
            'first_name' => '',
            'middle_name' => '',
            'suffix' => '',
            'gender' => '',
            'birthDate' => '',
            'birthPlace' => '',
            'contact_number' => '',
            'form_type' => '',
            'faLastName' => '',
            'faFirstName' => '',
            'faMiddleName' => '',
            'faSuffix' => '',
            'moMaidenname' => '',
            'moFirstName' => '',
            'moMiddleName' => '',
            'moSuffix' => '',
            'purpose' => '',
            'qty' => '',
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'last_name' => trim($_POST['lastName']),
                'first_name' => trim($_POST['firstName']),
                'middle_name' => trim($_POST['middleName']),
                'suffix' => trim($_POST['suffix']),
                'gender' => trim($_POST['gender']),
                'birth_date' => trim(date('Y-m-d', strtotime($_POST['birthDate']))),
                'birth_place' => trim($_POST['birthPlace']),
                'contact_number' => trim($_POST['contactNum']),
                'form_type' => trim($_POST['formType']),
                'faLastName' => trim($_POST['faLastName']),
                'faFirstName' => trim($_POST['faFirstName']),
                'faMiddleName' => trim($_POST['faMiddleName']),
                'faSuffix' => trim($_POST['faSuffix']),
                'moMaidenname' => trim($_POST['moMaidenname']),
                'moFirstName' => trim($_POST['moFirstName']),
                'moMiddleName' => trim($_POST['moMiddleName']),
                'moSuffix' => trim($_POST['moSuffix']),
                'purpose' => trim($_POST['purpose']),
                'qty' => trim($_POST['qty']),
                'table_name' => 'residency'
                
            ];
            // Add the data to residency table
            if($this->certificateModel->addResidency($data)) {
                // getFormId - get the id of residency and set it to $formId
                $formId = $this->certificateModel->getFormId($data)->id;

                if($_SESSION['account_type'] != 1){
                    $tableType = 'request';
                }else{
                    $tableType = 'walk_in';
                }

                $data = [
                    'form_type' => trim($_POST['formType']),
                    'qty' => trim($_POST['qty']),
                    'form_type' => 'Barangay Residency',
                    'formId' => $formId,
                    'table_name' => $tableType
                ];
                // Add the data to walk_in table
                if($this->certificateModel->addCertificate($data)){

                    // get the id of walk_in and set it to $formId
                    $formId = $this->certificateModel->getFormId($data)->id;

                    $data = [
                        'table_name' => 'residency',
                        'formId' => $formId
                    ];

                    if($this->certificateModel->addIdControl($data)){

                        $lastId = $this->certificateModel->getLastId($data);

                        if($_SESSION['account_type'] != 1){
                            header("Location: " .URLROOT . "/users");
                        }else{
                            header("Location: " .URLROOT . "/certificates/generate_residency/$lastId->control");
                        }

                    }  
                }
            }else {
                die("Something went wrong, please try again!");
            }
            

        }
    }

    public function modalClearance() {

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'last_name' => '',
            'first_name' => '',
            'middle_name' => '',
            'suffix' => '',
            'contact_number' => '',
            'form_type' => '',
            'permit_to' => '',
            'purpose' => '',
            'qty' => '',
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'last_name' => trim($_POST['lastName']),
                'first_name' => trim($_POST['firstName']),
                'middle_name' => trim($_POST['middleName']),
                'suffix' => trim($_POST['suffix']),
                'contact_number' => trim($_POST['contactNum']),
                'form_type' => trim($_POST['formType']),
                'permit_to' => trim($_POST['permitTo']),
                'purpose' => trim($_POST['purpose']),
                'qty' => trim($_POST['qty']),
                'table_name' => 'clearance'
                
            ];

            if($this->certificateModel->addClearance($data)){

                $formId = $this->certificateModel->getFormId($data)->id;

                if($_SESSION['account_type'] != 1){
                    $tableType = 'request';
                }else{
                    $tableType = 'walk_in';
                }

                $data = [
                    'form_type' => trim($_POST['formType']),
                    'qty' => trim($_POST['qty']),
                    'form_type' => 'Barangay Clearance',
                    'formId' => $formId,
                    'table_name' => $tableType
                ];
                if($this->certificateModel->addCertificate($data)){
                    $formId = $this->certificateModel->getFormId($data)->id;

                    $data = [
                        'table_name' => 'clearance',
                        'formId' => $formId
                    ];

                    if($this->certificateModel->addIdControl($data)){

                        $lastId = $this->certificateModel->getLastId($data);

                        if($_SESSION['account_type'] != 1){
                            header("Location: " .URLROOT . "/users");
                        }else{
                            header("Location: " .URLROOT . "/certificates/generate_clearance/$lastId->control");
                        }

                    }  
                }
            }else {
                die("Something went wrong, please try again!");
            }


            

        }

    }

    public function modalClearanceId() {




        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'last_name' => '',
            'first_name' => '',
            'middle_name' => '',
            'suffix' => '',
            'contact_number' => '',
            'form_type' => '',
            'permit_to' => '',
            'purpose' => '',
            'qty' => '',
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data =[
                'table_name' => 'clearance_id'
            ];

            $lastId = $this->certificateModel->getLastId($data);

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($lastId->id_no){
                $lastHolder = $lastId->id_no;
                $dateId = date('Y');
                //PHP 8.0 problem with substr so i use this alternative to get the first 4 characters
                $fourDigit = $lastHolder[0].$lastHolder[1].$lastHolder[2].$lastHolder[3];

                if($fourDigit != date('Y')){
                    $lastHolder = $lastId->id_no;
                    $dateId = date('Y') - 1;      
                }
            }else{
                $dateId = date('Y');
                echo $lastHolder = date('Y'). '-' . '00000';
            }


            $get_number = str_replace($dateId.'-', '', $lastHolder);
            $get_increase = $get_number+1;
            $get_string = str_pad($get_increase, '5', '0', STR_PAD_LEFT);

            $data = [
                'id_no' =>  date('Y').'-'.$get_string,
                'id_pic' => time() . '_' . $_FILES['idPic']['name'],
                'id_pic_None' => $_POST['idPicNone'],
                'address' => trim($_POST['address']),
                'gender' => trim($_POST['gender']),
                'civil_status' => trim($_POST['civilStatus']),
                'birth_date' => trim($_POST['birthDate']),
                'birth_place' => trim($_POST['birthPlace']),
                'last_name' => trim($_POST['lastName']),
                'first_name' => trim($_POST['firstName']),
                'middle_name' => trim($_POST['middleName']),
                'suffix' => trim($_POST['suffix']),
                'contact_number' => trim($_POST['contactNum']),
                'form_type' => trim($_POST['formType']),
                'permit_to' => trim($_POST['permitTo']),
                'purpose' => trim($_POST['purpose']),
                'qty' => trim($_POST['qty']),
                'table_name' => 'clearance_id'
                
            ];

            if(strlen($data['id_pic']) < 12){
                $data['id_pic'] = $data['id_pic_None'];
            }

            $target = '../public/img/id/' . $data['id_pic'];

            
            if(move_uploaded_file($_FILES['idPic']['tmp_name'], $target)){
                $_SESSION['msg'] = "Image uploaded";
                $_SESSION['css_class'] = "alert-success";
            }else {
                $_SESSION['msg'] = "Failed to upload";
                $_SESSION['css_class'] = "alert-danger";
            }

            if($this->certificateModel->addClearanceId($data)){

                $formId = $this->certificateModel->getFormId($data)->id;

                if($_SESSION['account_type'] != 1){
                    $tableType = 'request';
                }else{
                    $tableType = 'walk_in';
                }

                $data = [
                    'form_type' => trim($_POST['formType']),
                    'qty' => trim($_POST['qty']),
                    'form_type' => 'Barangay Clearance-ID',
                    'formId' => $formId,
                    'table_name' => $tableType
                ];
                if($this->certificateModel->addCertificate($data)){
                    $formId = $this->certificateModel->getFormId($data)->id;

                    $data = [
                        'table_name' => 'clearance_id',
                        'formId' => $formId
                    ];

                    if($this->certificateModel->addIdControl($data)){

                        $lastId = $this->certificateModel->getLastId($data);

                        if($_SESSION['account_type'] != 1){
                            header("Location: " .URLROOT . "/users");
                        }else{
                            header("Location: " .URLROOT . "/certificates/generate_clearance_id/$lastId->control");
                        }

                    }  
                }
            }else {
                die("Something went wrong, please try again!");
            }


            

        }

    }


    public function generate_indigency($id = '', $req = ''){

        $data = [
            'id' => $id,
            'req' => $req,
            'form_type' => 'indigency'
        ];

        $certificate = $this->certificateModel->findCertificateById($data);
        $detail = $this->adminModel->getBrgyDetail();

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'certificate' => $certificate,
            'detail' => $detail,
            'title' => 'Generate',
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

            $data = [
                
                
            ];


        }

        $this->view('certificates/generate_indigency', $data);
    }


    public function generate_permit($id = '', $req = ''){

        $data = [
            'id' => $id,
            'req' => $req,
            'form_type' => 'permit'
        ];

        $certificate = $this->certificateModel->findCertificateById($data);
        $detail = $this->adminModel->getBrgyDetail();
        

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'certificate' => $certificate,
            'detail' => $detail,
            'title' => 'Generate',
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

            $data = [
                
                
            ];


        }

        $this->view('certificates/generate_permit', $data);
    }


    public function generate_residency($id = '', $req = ''){

        $data = [
            'id' => $id,
            'req' => $req,
            'form_type' => 'residency'
        ];

        $certificate = $this->certificateModel->findCertificateById($data);
        $detail = $this->adminModel->getBrgyDetail();

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'certificate' => $certificate,
            'detail' => $detail,
            'title' => 'Generate',
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

            $data = [
                
                
            ];


        }

        $this->view('certificates/generate_residency', $data);
    }


    public function generate_clearance($id = '', $req = ''){

        $data = [
            'id' => $id,
            'req' => $req,
            'form_type' => 'clearance'
        ];

        $certificate = $this->certificateModel->findCertificateById($data);
        $detail = $this->adminModel->getBrgyDetail();

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'certificate' => $certificate,
            'detail' => $detail,
            'title' => 'Generate',
            
        ];


        $this->view('certificates/generate_clearance', $data);
    }


    public function generate_clearance_id($id = '', $req = ''){

        $data = [
            'id' => $id,
            'req' => $req,
            'form_type' => 'clearance_id'
        ];

        $certificate = $this->certificateModel->findCertificateById($data);
        $detail = $this->adminModel->getBrgyDetail();

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'certificate' => $certificate,
            'detail' => $detail,
            'title' => 'Generate',
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

            $data = [
                
                
            ];


        }

        $this->view('certificates/generate_clearance_id', $data);
    }

    public function view_detail($id = '', $req = '', $form_type = '') {
        $data = [
            'id' => $id,
            'form_type' => $form_type,
            'req' => $req
        ];


        $certificate = $this->certificateModel->findCertificateById($data);

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }

        $data = [
            'certificate' => $certificate,
            'title' => 'View Detail',
            
        ];
         echo json_encode($certificate);
        //$this->view('certificates/modals/modal-view-indigency', $data);
    }

    public function request($id = '', $form_type = '') {
        $data = [
            'id' => $id,
            'form_type' => $form_type,
            'req_status' => 'wait for approval'
        ];

        $requests = $this->certificateModel->findAllRequestCertificate($data);

        $data = [
            'id' => $id,
            'form_type' => $form_type,
            'req_status' => 'Approved'
        ];

        $approve = $this->certificateModel->findAllRequestCertificate($data);

        $data = [
            'id' => $id,
            'form_type' => $form_type,
            'req_status' => 'Disapproved'
        ];

        $disapprove = $this->certificateModel->findAllRequestCertificate($data);

        $data = [
            'id' => $id,
            'form_type' => $form_type,
            'req_status' => 'Completed'
        ];

        $complete = $this->certificateModel->findAllRequestCertificate($data);

        $certificate = $this->certificateModel->findCertificateById($data);

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'requests' => $requests,
            'approve' =>  $approve,
            'disapprove' =>  $disapprove,
            'complete' => $complete,
            'certificate' => $certificate,
            'title' => 'All Request'
            
        ];

        $this->view('certificates/request', $data);
    }

    public function req_status() {

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] != 1) {
            header("Location: " .URLROOT . "/users/index");
        }


        // APPROVE
        if(isset($_POST['btnApprove'])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'id' => trim($_POST['id']),
                'form_type' => trim($_POST['formType']),
                'req_status' => 'Approved',
                'control' => trim($_POST['control']), 
                'feedback' => trim($_POST['feedback']) 
                
            ];
            // Update request status
            if($this->certificateModel->updateStatus($data)) {
                if($_SESSION['account_type'] != 1){
                    header("Location: " .URLROOT . "/users");
                }else{
                    switch($data['form_type']){
                        case 'Barangay Indigency':
                            header("Location: " .URLROOT . "/certificates/generate_indigency/$data[control] . /req");
                            break;
                        case 'Barangay Permit':
                            header("Location: " .URLROOT . "/certificates/generate_permit/$data[control] . /req");
                            break;
                        case 'Barangay Residency':
                            header("Location: " .URLROOT . "/certificates/generate_residency/$data[control] . /req");
                            break;
                        case 'Barangay Clearance':
                            header("Location: " .URLROOT . "/certificates/generate_clearance/$data[control] . /req");
                            break;
                        case 'Barangay Clearance-ID':
                            header("Location: " .URLROOT . "/certificates/generate_clearance_id/$data[control] . /req");
                            break;
                    }
                    
                }

            }else {
                die("Something went wrong, please try again!");
            }
            

        }
        // DISAPPROVE
        if(isset($_POST['btnDisapprove'])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'id' => trim($_POST['id']),
                'form_type' => trim($_POST['formType']),
                'req_status' => 'Disapproved',
                'control' => trim($_POST['control']), 
                'feedback' => trim($_POST['feedback']) 
                
            ];
            // Update request status
            if($this->certificateModel->updateRequest($data)) {
                if($_SESSION['account_type'] != 1){
                    header("Location: " .URLROOT . "/users");
                }else{
                    header("Location: " .URLROOT . "/certificates/request");
                }

            }else {
                die("Something went wrong, please try again!");
            }
            

        }

        
    }

    public function done($control = ''){
        $data = [

            'control' => $control,
            'req_status' => 'Completed'
        ];

        if($this->certificateModel->updateComplete($data)) {
            if($_SESSION['account_type'] != 1){
                header("Location: " .URLROOT . "/users");
            }else{
                header("Location: " .URLROOT . "/certificates/request");
            }

        }else {
            die("Something went wrong, please try again!");
        }
    }


    public function loadResident(){


        $data = [
            'last_name' => $_POST['last_name'],
            'first_name' => $_POST['first_name'],
            'middle_name' => $_POST['middle_name'],
            'suffix' => $_POST['suffix']
        ];

        $searchResident = $this->certificateModel->loadResident($data);
       echo json_encode($searchResident);
    }




    public function generate_walkin(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $total = '';
        $year = '';
        $walkIn = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST') {


            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            

            $year = $_POST['year'];

            $data = [
                'year' => $_POST['year'],
                'yearEnd' => $_POST['year'] + 1 
            ];  

            $walkIn = $this->certificateModel->findAllWalkInCertificateOrderByName($data);

            $total = $this->certificateModel->countWalkInCertificate($data);

        }


        $details = $this->adminModel->getBrgyDetail();



        $data = [
            'walkIn' => $walkIn,
            'detail' => $details,
            'total' => $total,
            'issued' => $year,
        ];

        



        $this->view('certificates/generate_walkin', $data);
    }

    public function generate_request(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $total = '';
        $year = '';
        $request = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST') {


            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            

            $year = $_POST['year'];

            $data = [
                'year' => $_POST['year'],
                'yearEnd' => $_POST['year'] + 1 
            ];  

            $request = $this->certificateModel->findAllRequestCertificateOrderByName($data);

            $total = $this->certificateModel->countRequestCertificate($data);

        }


        $details = $this->adminModel->getBrgyDetail();



        $data = [
            'request' => $request,
            'detail' => $details,
            'total' => $total,
            'issued' => $year,
        ];

        



        $this->view('certificates/generate_request', $data);
    }


}