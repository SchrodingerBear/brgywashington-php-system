<?php
class Admin {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getBrgyDetail() {
        $this->db->query('SELECT * FROM brgy_detail');

        $row = $this->db->single();
        return $row;
 
    }

    
    public function getBrgyOfficial(){
        $this->db->query('SELECT * FROM brgy_official');


        $results = $this->db->resultSet();

        return $results;
    }

    public function findOfficialById($data){
        $this->db->query('SELECT * FROM brgy_official WHERE id = :id');
        $this->db->bind(':id', $data['id']);

        $row = $this->db->single();

        return $row;
    }
    

    public function updateBrgyDetail($data){

        $this->db->query('UPDATE brgy_detail SET brgy_name = :brgy_name, address = :address, mobile_number = :mobile_number, brgy_captain = :brgy_captain, pic_logo = :pic_logo, email = :email, tagline = :tagline, about = :about, bg_image = :bg_image, province = :province, municipality = :municipality');
        
        $this->db->bind(':brgy_name', $data['brgy_name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':mobile_number', $data['mobile_number']);
        $this->db->bind(':brgy_captain', $data['brgy_captain']);
        $this->db->bind(':pic_logo', $data['pic_logo']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':tagline', $data['tagline']);
        $this->db->bind(':about', $data['about']);
        $this->db->bind('province', $data['province']);
        $this->db->bind(':municipality', $data['municipality']);
        $this->db->bind(':bg_image', $data['bg_image']);


      
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }



    public function updateBrgyOfficial($data){

        $this->db->query('UPDATE brgy_official SET fullname = :fullname, committee = :committee, position = :position, contact_number = :contact_number WHERE id = :id');
        
        $this->db->bind(':fullname', $data['fullname']);
        $this->db->bind(':committee', $data['committee']);
        $this->db->bind(':position', $data['position']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':id', $data['id']);



      
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function countPendingRequest(){

        $this->db->query('SELECT * FROM request WHERE req_status = :req_status');

        $this->db->bind(':req_status', 'wait for approval');


        return $this->db->rowCount();

    }

    
    public function countAll(){

        $this->db->query('SELECT * FROM resident WHERE status = :status ');
        $this->db->bind(':status', 'Alive');

        return $this->db->rowCount();

    
    }

    public function countSingleMother(){

        $this->db->query('SELECT * FROM resident WHERE solo_parent = :solo_parent AND gender = :gender AND status = :status');

        $this->db->bind(':solo_parent', 'Yes');
        $this->db->bind(':gender', 'Female');
        $this->db->bind(':status', 'Alive');

        return $this->db->rowCount();

    }

    public function countSeniorCitizen(){

        $this->db->query('SELECT * FROM resident WHERE DATEDIFF(NOW(), birth_date)/365.25 BETWEEN 60 AND 1000 AND status = :status');
        $this->db->bind(':status', 'Alive');

        return $this->db->rowCount();

    }

    public function countVoters(){

        $this->db->query('SELECT * FROM resident WHERE status = :status AND voter = :voter');

        $this->db->bind(':voter', 'Yes');
        $this->db->bind(':status', 'Alive');


        return $this->db->rowCount();

    }

    public function countPwd(){

        $this->db->query('SELECT * FROM resident WHERE pwd = :pwd AND status = :status');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':pwd', 'Yes');


        return $this->db->rowCount();

    }

    public function countVaccinated(){

        $this->db->query('SELECT * FROM resident WHERE vaccinated = :vaccinated AND status = :status');
        $this->db->bind(':status', 'Alive');

        $this->db->bind(':vaccinated', 'Yes');


        return $this->db->rowCount();

    }


    public function countCovidPositive(){

        $this->db->query('SELECT * FROM resident WHERE covid_status = :covid_status AND status = :status');
        $this->db->bind(':status', 'Alive');

        $this->db->bind(':covid_status', 'Positive');


        return $this->db->rowCount();

    }

    public function count4ps(){

        $this->db->query('SELECT * FROM resident WHERE pantawid_pamilya = :pantawid_pamilya AND status = :status');
        $this->db->bind(':status', 'Alive');

        $this->db->bind(':pantawid_pamilya', 'Yes');


        return $this->db->rowCount();

    }

    public function countIndigent(){

        $this->db->query('SELECT * FROM resident WHERE indigent = :indigent AND status = :status');
        $this->db->bind(':status', 'Alive');

        $this->db->bind(':indigent', 'Yes');


        return $this->db->rowCount();

    }

    public function countAllMale(){

        $this->db->query('SELECT * FROM resident WHERE gender = :gender AND status = :status');
        $this->db->bind(':status', 'Alive');

        $this->db->bind(':gender', 'Male');


        return $this->db->rowCount();

    }
    public function countAllFemale(){

        $this->db->query('SELECT * FROM resident WHERE gender = :gender AND status = :status');
        $this->db->bind(':status', 'Alive');

        $this->db->bind(':gender', 'Female');


        return $this->db->rowCount();

    }

    public function countToVerify(){

        $this->db->query('SELECT * FROM user WHERE status = :status');
        $this->db->bind(':status', 'To verify');



        return $this->db->rowCount();

    }

    public function getContent(){
        $this->db->query('SELECT * FROM content WHERE id = :id');
        $this->db->bind(':id', 1);
        $row = $this->db->single();

        return $row;
    }


    public function updateContent($data){
        $this->db->query('UPDATE content SET photo = :photo WHERE id = :id');
        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':id', 1);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }






    

}
