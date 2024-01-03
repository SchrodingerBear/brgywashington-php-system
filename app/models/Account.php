
<?php
class Account {
    private $db;
    

    public function __construct(){
        $this->db = new Database;
    }



    public function findAllAccountToVerify(){
        $this->db->query('SELECT * FROM user WHERE status = :status');

        $this->db->bind(':status', 'To verify');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllAccountVerified(){
        $this->db->query('SELECT * FROM user WHERE status = :status');

        $this->db->bind(':status', 'Verified');

        $results = $this->db->resultSet();

        return $results;
    }


    public function updateAccountStatus($data){
        $this->db->query('UPDATE user SET status = :status  WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':status', $data['status']);
        // $this->db->bind(':profile_pic', $data['profile_pic']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function updateAccountPassword($data){
        $this->db->query('UPDATE user SET password = :password WHERE username = :username');

        $this->db->bind(':password', $data['password']);
        $this->db->bind(':username', $data['username']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function updateAccountRole($data){
        $this->db->query('UPDATE user SET account_type = :account_type WHERE username = :username');
        $this->db->bind(':account_type', $data['accountType']);
        $this->db->bind(':username', $data['username']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }









    

}
