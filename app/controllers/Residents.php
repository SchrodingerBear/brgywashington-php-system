<?php 
class Residents extends Controller {
    public $session;
    public function __construct() {
        $this->residentModel = $this->model('Resident');
        $this->adminModel = $this->model('Admin');
        $this->session = new Session;
    }

    public function check_resident(){
        if(isset($_POST['check_submit_btn'])){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =  [
                'last_name' => trim($_POST['checkLastName']),
                'first_name' => trim($_POST['checkFirstName']),
                'middle_name' => trim($_POST['checkMiddleName']),
                'suffix' => $_POST['checkSuffix']
            ];


            if($this->residentModel->checkResident($data)){
                echo "Resident was already registered!";
            }else {
                echo "It's good!";
            }


        }
    }

   

    public function check_edit_resident(){
        if(isset($_POST['check_submit_btn'])){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =  [
                'last_name' => trim($_POST['checkLastName']),
                'first_name' => trim($_POST['checkFirstName']),
                'middle_name' => trim($_POST['checkMiddleName']),
                'suffix' => $_POST['checkSuffix'],
                'id' => $_POST['checkId']
            ];

            $old = $this->residentModel->checkEditResident($data);

            if(!$old){
                if($this->residentModel->checkResident($data)){
                    echo "Resident was already registered!";
                }else {
                    echo "It's good!";
                }
            }





        }
    }

    public function modalAddResident(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];



        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($_SESSION['account_type'] == 1){
                $addedBy = 'Admin: ' . $_SESSION['firstname'] .' ' . $_SESSION['middlename'] . ' ' . $_SESSION['lastname'] .' '. $_SESSION['suffix'];
            }
            if($_SESSION['account_type'] == 2){
                $addedBy = 'BHW: ' . $_SESSION['firstname'] .' ' . $_SESSION['middlename'] . ' ' . $_SESSION['lastname'] .' '. $_SESSION['suffix'];
            }





            $data = [
                'last_name' => trim($_POST['lastName']),
                'first_name' => trim($_POST['firstName']),
                'middle_name' => trim($_POST['middleName']),
                'suffix' => trim($_POST['suffix']),
                'gender' => trim($_POST['gender']),
                'birth_date' => trim($_POST['birthDate']),
                'birth_place' => trim($_POST['birthPlace']),
                // 'age' => trim($_POST['age']),
                'civil_status' => trim($_POST['civilStatus']),
                'nationality' => trim($_POST['nationality']),
                'religion' => trim($_POST['religion']),
                'occupation' => trim($_POST['occupation']),
                'contact_number' => trim($_POST['contactNum']),
                'pwd' => trim($_POST['pwd']),
                'pwd_id' => trim($_POST['pwdId']),
                'family_monthly_income' => trim($_POST['familyMonthlyIncome']),
                'indigent' => trim($_POST['indigent']),
                'solo_parent' => trim($_POST['soloParent']),
                'solo_parent_id' => trim($_POST['soloParentId']),
                'pantawid_pamilya' => trim($_POST['pantawidPamilya']),
                'voter' => trim($_POST['voter']),
                'purok' => trim($_POST['purok']),
                'house_no' => trim($_POST['houseNo']),
                'street' => trim($_POST['street']),
                'to_contact_fullname' => trim($_POST['toContactFullName']),
                'to_contact_relationship' => trim($_POST['toContactRelationship']),
                'to_contact_number' => trim($_POST['toContactNumber']),
                'to_contact_address' => trim($_POST['toContactAddress']),
                'national_id_no' => trim($_POST['nationalIdNo']),
                'philhealth_no' => trim($_POST['philhealthNo']),
                'sss_no' => trim($_POST['sssNo']),
                'pagibig_no' => trim($_POST['pagibigNo']),
                'tin_no' => trim($_POST['tinNo']),
                'voter_id_no' => trim($_POST['votersIdNo']),
                'covid_status' => trim($_POST['covidStatus']),
                'vaccinated' => trim($_POST['vaccinated']),
                'date_registered' => trim($_POST['dateOfRegistration']),
                'date_death' => trim($_POST['dateOfDeath']),
                'status' => trim($_POST['status']),
                'profile_pic' => time() . '_' . $_FILES['idPic']['name'],
                'added_by' => $addedBy  ,
                
            ];



            if($this->residentModel->checkResident($data)){
                $this->session->setFlash('status', 'Resident is already registered!');
                $this->session->setFlash('status_icon', 'error');
                $this->session->setFlash('status_text', 'We do not allow duplicated record!');
                header('location: '. URLROOT . '/residents/index');
            }else {
                $target = '../public/img/id/resident/' . $data['profile_pic'];

            
                if(move_uploaded_file($_FILES['idPic']['tmp_name'], $target)){
                    $_SESSION['msg'] = "Image uploaded";
                    $_SESSION['css_class'] = "alert-success";
                }else {
                    $_SESSION['msg'] = "Failed to upload";
                    $_SESSION['css_class'] = "alert-danger";
                }
    
    
    
                if($this->residentModel->addResident($data)){
                    $this->session->setFlash('status', 'Resident added Successfully!');
                    $this->session->setFlash('status_icon', 'success');
                    header('location: '. URLROOT . '/residents/index');
                }else{
                    header('location: '. URLROOT . '/certificates');
                }

            }



        }

    }

    public function modalEditResident(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_SESSION['account_type'] == 1){
                $updatedBy = 'Admin: ' . $_SESSION['firstname'] .' ' . $_SESSION['middlename'] . ' ' . $_SESSION['lastname'] .' '. $_SESSION['suffix'];
            }
            if($_SESSION['account_type'] == 2){
                $updatedBy = 'BHW: ' . $_SESSION['firstname'] .' ' . $_SESSION['middlename'] . ' ' . $_SESSION['lastname'] .' '. $_SESSION['suffix'];
            }
            $data = [
                'id' => trim($_POST['id']),
                'last_name' => trim($_POST['lastName']),
                'first_name' => trim($_POST['firstName']),
                'middle_name' => trim($_POST['middleName']),
                'suffix' => trim($_POST['suffix']),
                'gender' => trim($_POST['gender']),
                'birth_date' => trim($_POST['birthDate']),
                'birth_place' => trim($_POST['birthPlace']),
                // 'age' => trim($_POST['age']),
                'civil_status' => trim($_POST['civilStatus']),
                'nationality' => trim($_POST['nationality']),
                'religion' => trim($_POST['religion']),
                'occupation' => trim($_POST['occupation']),
                'contact_number' => trim($_POST['contactNum']),
                'pwd' => trim($_POST['pwd']),
                'pwd_id' => trim($_POST['pwdId']),
                'family_monthly_income' => trim($_POST['familyMonthlyIncome']),
                'indigent' => trim($_POST['indigent']),
                'solo_parent' => trim($_POST['soloParent']),
                'solo_parent_id' => trim($_POST['soloParentId']),
                'pantawid_pamilya' => trim($_POST['pantawidPamilya']),
                'voter' => trim($_POST['voter']),
                'purok' => trim($_POST['purok']),
                'house_no' => trim($_POST['houseNo']),
                'street' => trim($_POST['street']),
                'to_contact_fullname' => trim($_POST['toContactFullName']),
                'to_contact_relationship' => trim($_POST['toContactRelationship']),
                'to_contact_number' => trim($_POST['toContactNumber']),
                'to_contact_address' => trim($_POST['toContactAddress']),
                'national_id_no' => trim($_POST['nationalIdNo']),
                'philhealth_no' => trim($_POST['philhealthNo']),
                'sss_no' => trim($_POST['sssNo']),
                'pagibig_no' => trim($_POST['pagibigNo']),
                'tin_no' => trim($_POST['tinNo']),
                'voter_id_no' => trim($_POST['votersIdNo']),
                'covid_status' => trim($_POST['covidStatus']),
                'vaccinated' => trim($_POST['vaccinated']),
                // 'date_registered' => trim($_POST['dateOfRegistration']),
                'date_death' => trim($_POST['dateOfDeath']),
                'status' => trim($_POST['status']),
                'profile_pic' => time() . '_' . $_FILES['idPic']['name'],
                'updated_by' => $updatedBy,
                
            ];
            $dbResident  = $this->residentModel->checkEditResidentById($data);
            $accountVerified = $this->residentModel->checkIfVerified($dbResident);
            // echo $accountVerified;
            // if($accountVerified){
            //     Log::alert("message");
            // }
            $old = $this->residentModel->checkEditResident($data);

            if($accountVerified){

                // echo $accountVerified->last_name;
                // echo $accountVerified->middle_name;
                // echo $accountVerified->first_name;
                // echo $accountVerified->suffix;
                // Log::alert("message");

                if(!$old){
                


                    if($this->residentModel->checkResident($data)){
                        $this->session->setFlash('status', 'Resident is already registered!');
                        $this->session->setFlash('status_icon', 'error');
                        $this->session->setFlash('status_text', 'We do not allow duplicated record!');
                        header('location: '. URLROOT . '/residents/index');
                    }else {
                        if(strlen($data['profile_pic']) < 12){
                            if($this->residentModel->editResidentNoPic($data) AND $this->residentModel->editAccountVerified($accountVerified, $data)){
                                $this->session->setFlash('status', 'Update successfully!');
                                $this->session->setFlash('status_icon', 'success');
                                header('location: '. URLROOT . '/residents/index');
                            }else {
                                header('location: '. URLROOT . '/certificates');
             
                            }
                        }else {
                            if($this->residentModel->editResident($data) AND $this->residentModel->editAccountVerified($accountVerified, $data)){
                                $target = '../public/img/id/resident/' . $data['profile_pic'];
                        
                                if(move_uploaded_file($_FILES['idPic']['tmp_name'], $target)){
                                    $_SESSION['msg'] = "Image uploaded";
                                    $_SESSION['css_class'] = "alert-success";
                                }else {
                                    $_SESSION['msg'] = "Failed to upload";
                                    $_SESSION['css_class'] = "alert-danger";
                                }
                                header('location: '. URLROOT . '/residents/index');
                            }else {
                                echo "sa with pic ako nag run";
                                Log::alert("message");
                                header('location: '. URLROOT . '/certificates');
                            }
                        }
                    }
                }else {
                    if(strlen($data['profile_pic']) < 12){
                        if($this->residentModel->editResidentNoPic($data) AND $this->residentModel->editAccountVerified($accountVerified, $data)){
                            $this->session->setFlash('status', 'Update successfully!');
                            $this->session->setFlash('status_icon', 'success');
                            header('location: '. URLROOT . '/residents/index');
                        }else {
                            header('location: '. URLROOT . '/certificates');
         
                        }
                    }else {
                        if($this->residentModel->editResident($data) AND $this->residentModel->editAccountVerified($accountVerified, $data)){
                            $target = '../public/img/id/resident/' . $data['profile_pic'];
                    
                            if(move_uploaded_file($_FILES['idPic']['tmp_name'], $target)){
                                $_SESSION['msg'] = "Image uploaded";
                                $_SESSION['css_class'] = "alert-success";
                            }else {
                                $_SESSION['msg'] = "Failed to upload";
                                $_SESSION['css_class'] = "alert-danger";
                            }
                            header('location: '. URLROOT . '/residents/index');
                        }else {
                            echo "sa with pic ako nag run";
                            Log::alert("message");
                            header('location: '. URLROOT . '/certificates');
                        }
                    }
                }
            }else {
                if(!$old){
                
                    if($this->residentModel->checkResident($data)){
                        $this->session->setFlash('status', 'Resident is already registered!');
                        $this->session->setFlash('status_icon', 'error');
                        $this->session->setFlash('status_text', 'We do not allow duplicated record!');
                        header('location: '. URLROOT . '/residents/index');
                    }else {
                        if(strlen($data['profile_pic']) < 12){
                            if($this->residentModel->editResidentNoPic($data)){
                                $this->session->setFlash('status', 'Update successfully!');
                                $this->session->setFlash('status_icon', 'success');
                                header('location: '. URLROOT . '/residents/index');
                            }else {
                                header('location: '. URLROOT . '/certificates');
             
                            }
                        }else {
                            if($this->residentModel->editResident($data)){
                                $target = '../public/img/id/resident/' . $data['profile_pic'];
                        
                                if(move_uploaded_file($_FILES['idPic']['tmp_name'], $target)){
                                    $_SESSION['msg'] = "Image uploaded";
                                    $_SESSION['css_class'] = "alert-success";
                                }else {
                                    $_SESSION['msg'] = "Failed to upload";
                                    $_SESSION['css_class'] = "alert-danger";
                                }
                                header('location: '. URLROOT . '/residents/index');
                            }else {
                                echo "sa with pic ako nag run";
                                Log::alert("message");
                                header('location: '. URLROOT . '/certificates');
                            }
                        }
                    }
                }else {
                    if(strlen($data['profile_pic']) < 12){
                        if($this->residentModel->editResidentNoPic($data)){
                            $this->session->setFlash('status', 'Update successfully!');
                            $this->session->setFlash('status_icon', 'success');
                            header('location: '. URLROOT . '/residents/index');
                        }else {
                            header('location: '. URLROOT . '/certificates');
         
                        }
                    }else {
                        if($this->residentModel->editResident($data)){
                            $target = '../public/img/id/resident/' . $data['profile_pic'];
                    
                            if(move_uploaded_file($_FILES['idPic']['tmp_name'], $target)){
                                $_SESSION['msg'] = "Image uploaded";
                                $_SESSION['css_class'] = "alert-success";
                            }else {
                                $_SESSION['msg'] = "Failed to upload";
                                $_SESSION['css_class'] = "alert-danger";
                            }
                            header('location: '. URLROOT . '/residents/index');
                        }else {
                            echo "sa with pic ako nag run";
                            Log::alert("message");
                            header('location: '. URLROOT . '/certificates');
                        }
                    }
                }
            }
            



        }

    }

    public function delete_resident(){
        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }



        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $_POST['id']
            ];

            if($this->residentModel->deleteResident($data)){
                header('location: '. URLROOT . '/residents/index');
            }else {
                die('Something went wrong!');
            }
        }

        

    }
    



    public function index() {

        // Redirect if not logged in
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login");
        } else if ($_SESSION['account_type'] == 0) {
            header("Location: " . URLROOT . "/users/index");
        }
    
        // Default filter values
        $minIncome = isset($_GET['min_income']) ? (int)$_GET['min_income'] : 0;
        $maxIncome = isset($_GET['max_income']) ? (int)$_GET['max_income'] : 1000000;
    
        // Fetch residents based on filter
        $residents = $this->residentModel->getResidentsByIncome($minIncome, $maxIncome);
    
        // Prepare data for the view
        $data = [
            'title' => 'Home Page',
            'residents' => $residents,
            'min_income' => $minIncome,
            'max_income' => $maxIncome,
        ];
    
        // Load the view
        $this->view('residents/index', $data);
    }
    
    public function generate_resident(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAllResidentsOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $totalMale = $this->adminModel->countAllMale();
        $totalFemale = $this->adminModel->countAllFemale();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'totalMale' => $totalMale,
            'totalFemale' => $totalFemale
        ];

        



        $this->view('residents/generate_resident', $data);
    }

    public function generate_senior(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAllSeniorCitizenOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $totalSenior = $this->adminModel->countSeniorCitizen();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'totalSenior' => $totalSenior,
        ];

        



        $this->view('residents/generate_senior', $data);
    }

    public function generate_single_mother(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAllSingleMotherOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $totalSingleMother = $this->adminModel->countSingleMother();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'totalSingleMother' => $totalSingleMother,
        ];

        



        $this->view('residents/generate_single_mother', $data);
    }

    public function generate_voter(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAllVoterOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $totalVoter = $this->adminModel->countVoters();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'totalVoter' => $totalVoter,
        ];

        



        $this->view('residents/generate_voter', $data);
    }

    public function generate_pwd(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAllPwdOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $totalPwd = $this->adminModel->countPwd();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'totalPwd' => $totalPwd,
        ];

        



        $this->view('residents/generate_pwd', $data);
    }

    public function generate_vaccinated(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAllVaccinatedOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $totalVaccinated = $this->adminModel->countVaccinated();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'totalVaccinated' => $totalVaccinated,
        ];

        



        $this->view('residents/generate_vaccinated', $data);
    }

    public function generate_covid(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAllCovidOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $totalCovid = $this->adminModel->countCovidPositive();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'totalCovid' => $totalCovid,
        ];

        



        $this->view('residents/generate_covid', $data);
    }

    public function generate_indigent(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAllIndigentOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $totalIndigent = $this->adminModel->countIndigent();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'totalIndigent' => $totalIndigent
        ];

        



        $this->view('residents/generate_indigent', $data);
    }

    
    public function generate_4ps(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $residents = $this->residentModel->findAll4psOrderByName();
        $details = $this->adminModel->getBrgyDetail();

        $total4ps = $this->adminModel->count4ps();

        $data = [
            'residents' => $residents,
            'detail' => $details,
            'total4ps' => $total4ps
        ];

        



        $this->view('residents/generate_4ps', $data);
    }


    public function senior_citizen(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $seniorCitizen = $this->residentModel->findAllSeniorCitizen();

        $data = [
            'seniorCitizen' => $seniorCitizen
        ];

        



        $this->view('residents/senior_citizen', $data);
    }

    public function single_mother(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $singleMother = $this->residentModel->findAllSingleMother();

        $data = [
            'singleMother' => $singleMother
        ];

        



        $this->view('residents/single_mother', $data);
    }

    public function voters(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $voters = $this->residentModel->findAllVoters();

        $data = [
            'voters' => $voters
        ];

        



        $this->view('residents/voters', $data);
    }

    public function pwd(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $pwd = $this->residentModel->findAllPwd();

        $data = [
            'pwd' => $pwd
        ];

        



        $this->view('residents/pwd', $data);
    }

    public function vaccinated(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $vaccinated = $this->residentModel->findAllVaccinated();

        $data = [
            'vaccinated' => $vaccinated
        ];

        



        $this->view('residents/vaccinated', $data);
    }

    public function covid_case(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $covidPositive = $this->residentModel->findAllCovidPositive();

        $data = [
            'covidPositive' => $covidPositive
        ];

        



        $this->view('residents/covid_case', $data);
    }

    public function pantawid_pamilya(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $pantawidPamilya = $this->residentModel->findAll4ps();

        $data = [
            'pantawid_pamilya' => $pantawidPamilya
        ];

        



        $this->view('residents/pantawid_pamilya', $data);
    }

    public function indigent(){

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }else if( $_SESSION['account_type'] == 0) {
            header("Location: " .URLROOT . "/users/index");
        }

        $data = [
            'title' => 'Home page',
        ];

        $indigent = $this->residentModel->findAllIndigent();

        $data = [
            'indigent' => $indigent
        ];

        



        $this->view('residents/indigent', $data);
    }



    public function view_resident($id = '') {
        $data = [
            'id' => $id,
        ];


        $resident = $this->residentModel->findResidentById($data);

        if(!isLoggedIn()) {
            header("Location: " .URLROOT . "/users/login");
        }

        $data = [
            'resident' => $resident,
            
        ];
         echo json_encode($resident);
        //$this->view('certificates/modals/modal-view-indigency', $data);
    }


}