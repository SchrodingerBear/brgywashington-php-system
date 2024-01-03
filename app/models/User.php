<?php
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function register($data) {

        $this->db->query('INSERT INTO user (username, first_name, last_name, middle_name, suffix, password, date_created, account_type) VALUES(:username, :firstName, :lastName, :middleName, :suffix, :password, :dateCreated, :accountType)');



        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':middleName', $data['middleName']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':dateCreated', date("d-m-Y"));
        $this->db->bind(':accountType', 0);


        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM user WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = !empty($row) ? $row->password:'';

        if(password_verify($password, $hashedPassword)){
            return $row;
        }else {
            return false;
        }
    }

    public function findUser($data) {
        $this->db->query('SELECT username FROM user WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $data['username']);

        $row = $this->db->single();

        return $row;
    }

    public function checkResidentList($data) {
        $this->db->query('SELECT * FROM resident WHERE last_name = :last_name AND first_name = :first_name AND middle_name = :middle_name AND suffix = :suffix');

        //Bind value
        $this->db->bind(':last_name', $data['lastName']);
        $this->db->bind(':middle_name', $data['middleName']);
        $this->db->bind(':first_name', $data['firstName']);
        $this->db->bind(':suffix', $data['suffix']);

        $row = $this->db->single();

        return $row;
    }
    

    public function findMobileNumber($data){
        $this->db->query('SELECT mobile_number FROM user WHERE mobile_number = :mobileNumber');

        //Bind value
        $this->db->bind(':mobileNumber', $data['mobileNumber']);

        $row = $this->db->single();

        return $row;
    }

    //Find user by mobile number. Mobile number is passed in by controller.
    public function findUserByMobileNumber($data){
        //Prepared statement
        $this->db->query('SELECT * FROM user WHERE mobile_number = :mobileNumber');

        //Email param will be binded with the mobile number variable.
        $this->db->bind(':mobileNumber', $mobileNumber);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function getUsers() {
        $this->db->query("SELECT * FROM user");
        $result = $this->db->resultSet();

        return $result;
    }

    public function getUserDetailsById($data) {
        $this->db->query('SELECT * FROM user WHERE id = :id');

        //Bind value
        $this->db->bind(':id', $data['id']);

        $row = $this->db->single();

        return $row;
    }

    public function getUserDetails($data) {
        $this->db->query('SELECT * FROM user WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $data['username']);

        $row = $this->db->single();

        return $row;
    }

    public function changePassword($data) {
        $this->db->query('SELECT * FROM user WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $data['username']);

        $row = $this->db->single();

        $hashedPassword = !empty($row) ? $row->password:'';

        if(password_verify($data['current_password'], $hashedPassword)  ){

            $this->db->query('UPDATE user SET password = :password WHERE username = :username ');
            $this->db->bind(':password',$data['new_password']);
            $this->db->bind(':username',$data['username']);
            
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }

    public function editProfile($data){
        $this->db->query('UPDATE user SET  username = :username, profile_pic = :profile_pic WHERE id = :id');

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':profile_pic', $data['profile_pic']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    // public function changeLogo($data){
    //     $this->db->query('UPDATE user SET profile_pic = :profile_pic');
    //     $this->db->bind(':profile_pic', $data['profile_pic']);

    //     if($this->db->execute()){
    //         return true;
    //     }else {
    //         return false;
    //     }

    // }

   
    public function requestVerifyAccount($data){
        $this->db->query('UPDATE user SET  sup_document = :sup_document, status = :status WHERE username = :username');


        $this->db->bind(':username', $data['username']);
        $this->db->bind(':sup_document', $data['sup_document']);
        $this->db->bind(':status', 'To verify');

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    

    public function checkAccountStatus($data) {
        $this->db->query('SELECT * FROM user WHERE last_name = :last_name AND first_name = :first_name AND middle_name = :middle_name AND suffix = :suffix AND status = :status');

        //Bind value
        $this->db->bind(':last_name', $data['lastName']);
        $this->db->bind(':first_name', $data['firstName']);
        $this->db->bind(':middle_name', $data['middleName']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':status', 'Verified');

        $row = $this->db->single();

        return $row;
    }

}