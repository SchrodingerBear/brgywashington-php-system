<?php
class Resident {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }



    public function addResident($data) {

        $this->db->query('INSERT INTO resident (added_by, last_name, first_name, middle_name, suffix, gender, birth_date, birth_place,  civil_status, nationality, religion,occupation, contact_number, pwd, pwd_id, family_monthly_income, indigent, solo_parent, solo_parent_id, pantawid_pamilya, voter, purok, house_no, street, to_contact_fullname, to_contact_relationship, to_contact_number, to_contact_address, national_id_no, philhealth_no, sss_no, pagibig_no, tin_no, voter_id_no, covid_status, vaccinated, date_registered, date_death, status, profile_pic ) VALUES (:added_by, :last_name, :first_name, :middle_name, :suffix, :gender, :birth_date, :birth_place, :civil_status, :nationality, :religion,:occupation, :contact_number, :pwd, :pwd_id, :family_monthly_income, :indigent, :solo_parent, :solo_parent_id, :pantawid_pamilya, :voter, :purok, :house_no, :street, :to_contact_fullname, :to_contact_relationship, :to_contact_number, :to_contact_address, :national_id_no, :philhealth_no, :sss_no, :pagibig_no, :tin_no, :voter_id_no, :covid_status, :vaccinated, :date_registered, :date_death, :status, :profile_pic )');

        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':birth_place', $data['birth_place']);
        $this->db->bind(':civil_status', $data['civil_status']);
        $this->db->bind(':nationality', $data['nationality']);
        $this->db->bind(':religion', $data['religion']);
        $this->db->bind(':occupation', $data['occupation']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':pwd', $data['pwd']);
        $this->db->bind(':pwd_id', $data['pwd_id']);
        $this->db->bind(':family_monthly_income', $data['family_monthly_income']);
        $this->db->bind(':indigent', $data['indigent']);
        $this->db->bind(':solo_parent', $data['solo_parent']);
        $this->db->bind(':solo_parent_id', $data['solo_parent_id']);
        $this->db->bind(':pantawid_pamilya', $data['pantawid_pamilya']);
        $this->db->bind(':voter', $data['voter']);
        $this->db->bind(':purok', $data['purok']);
        $this->db->bind(':house_no', $data['house_no']);
        $this->db->bind(':street', $data['street']);
        $this->db->bind(':to_contact_fullname', $data['to_contact_fullname']);
        $this->db->bind(':to_contact_relationship', $data['to_contact_relationship']);
        $this->db->bind(':to_contact_number', $data['to_contact_number']);
        $this->db->bind(':to_contact_address', $data['to_contact_address']);
        $this->db->bind(':national_id_no', $data['national_id_no']);
        $this->db->bind(':philhealth_no', $data['philhealth_no']);
        $this->db->bind(':sss_no', $data['sss_no']);
        $this->db->bind(':pagibig_no', $data['pagibig_no']);
        $this->db->bind(':tin_no', $data['tin_no']);
        $this->db->bind(':voter_id_no', $data['voter_id_no']);
        $this->db->bind(':covid_status', $data['covid_status']);
        $this->db->bind(':vaccinated', $data['vaccinated']);
        $this->db->bind(':date_registered', $data['date_registered']);
        $this->db->bind(':date_death', $data['date_death']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':profile_pic', $data['profile_pic']);
        $this->db->bind(':added_by', $data['added_by']);

     

    

        if($this->db->execute()){

            return true;

        }else {

            return false;
        }
    }


    public function getResidentsByIncome($minIncome, $maxIncome) {
        $this->db->query("SELECT * FROM resident WHERE family_monthly_income BETWEEN :minIncome AND :maxIncome");
        $this->db->bind(':minIncome', $minIncome);
        $this->db->bind(':maxIncome', $maxIncome);
    
        return $this->db->resultSet();
    }
    
    public function findAllResidents() {
        $this->db->query('SELECT * FROM resident ORDER BY date_registered DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    

    public function findAllResidentsOrderByName() {
        $this->db->query('SELECT * FROM resident ORDER BY last_name ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllSeniorCitizenOrderByName() {
        $this->db->query('SELECT * FROM resident WHERE DATEDIFF(NOW(), birth_date)/365.25 BETWEEN 60 AND 1000 AND status = :status ORDER BY last_name ASC');
        $this->db->bind(':status', 'Alive');
        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllSingleMotherOrderByName() {
        $this->db->query('SELECT * FROM resident WHERE status = :status AND gender = :gender AND solo_parent = :solo_parent ORDER BY last_name ASC');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':solo_parent', 'Yes');
        $this->db->bind(':gender', 'Female');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getFilteredResidents($min_income = null, $max_income = null) {
        $sql = "SELECT * FROM residents WHERE 1=1";  // Default query to select all residents
    
        // Apply filters if they are set
        if ($min_income) {
            $sql .= " AND family_monthly_income >= :min_income";
        }
        if ($max_income) {
            $sql .= " AND family_monthly_income <= :max_income";
        }
    
        $stmt = $this->db->prepare($sql);
    
        // Bind the parameters
        if ($min_income) {
            $stmt->bindParam(':min_income', $min_income);
        }
        if ($max_income) {
            $stmt->bindParam(':max_income', $max_income);
        }
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    

    public function findAllVoterOrderByName() {
        $this->db->query('SELECT * FROM resident WHERE status = :status AND voter = :voter ORDER BY last_name ASC');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':voter', 'Yes');


        $results = $this->db->resultSet();

        return $results;
    }
    
    public function findAllVaccinatedOrderByName() {
        $this->db->query('SELECT * FROM resident WHERE status = :status AND vaccinated = :vaccinated ORDER BY last_name ASC');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':vaccinated', 'Yes');


        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllCovidOrderByName() {
        $this->db->query('SELECT * FROM resident WHERE status = :status AND covid_status = :covid_status ORDER BY last_name ASC');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':covid_status', 'Positive');


        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllPwdOrderByName() {
        $this->db->query('SELECT * FROM resident WHERE status = :status AND pwd = :pwd ORDER BY last_name ASC');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':pwd', 'Yes');


        $results = $this->db->resultSet();

        return $results;
    }

    public function findAll4psOrderByName() {
        $this->db->query('SELECT * FROM resident WHERE status = :status AND pantawid_pamilya = :pantawid_pamilya ORDER BY last_name ASC');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':pantawid_pamilya', 'Yes');


        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllIndigentOrderByName() {
        $this->db->query('SELECT * FROM resident WHERE status = :status AND indigent = :indigent ORDER BY last_name ASC');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':indigent', 'Yes');


        $results = $this->db->resultSet();

        return $results;
    }

    

    

    public function findResidentById($data){
        $this->db->query('SELECT * FROM resident WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        
        $row = $this->db->single();
        return $row;
    }
    public function findAllSeniorCitizen() {
        $this->db->query('SELECT * FROM resident WHERE  DATEDIFF(NOW(), birth_date)/365.25 BETWEEN 60 AND 1000 AND status = :status ');
        $this->db->bind(':status', 'Alive');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllSingleMother() {
        $this->db->query('SELECT * FROM resident WHERE solo_parent = :solo_parent AND gender = :gender AND status = :status');
        $this->db->bind(':status', 'Alive');

        $this->db->bind(':solo_parent', 'Yes');
        $this->db->bind(':gender', 'Female');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllVoters() {
        $this->db->query('SELECT * FROM resident WHERE voter = :voter AND status = :status');
        $this->db->bind(':status', 'Alive');
        $this->db->bind(':voter', 'Yes');

        $results = $this->db->resultSet();

        return $results;
    }


    public function findAllPwd() {
        $this->db->query('SELECT * FROM resident WHERE pwd = :pwd AND status = :status');
        $this->db->bind(':pwd', 'Yes');
        $this->db->bind(':status', 'Alive');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllVaccinated() {
        $this->db->query('SELECT * FROM resident WHERE vaccinated = :vaccinated AND status = :status');

        $this->db->bind(':vaccinated', 'Yes');
        $this->db->bind(':status', 'Alive');


        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllCovidPositive() {
        $this->db->query('SELECT * FROM resident WHERE covid_status = :covid_status AND status = :status');

        $this->db->bind(':covid_status', 'Positive');
        $this->db->bind(':status', 'Alive');


        $results = $this->db->resultSet();

        return $results;
    }

    public function findAll4ps() {
        $this->db->query('SELECT * FROM resident WHERE pantawid_pamilya = :pantawid_pamilya AND status = :status');

        $this->db->bind(':pantawid_pamilya', 'Yes');
        $this->db->bind(':status', 'Alive');


        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllIndigent() {
        $this->db->query('SELECT * FROM resident WHERE indigent = :indigent AND status = :status');

        $this->db->bind(':indigent', 'Yes');
        $this->db->bind(':status', 'Alive');


        $results = $this->db->resultSet();

        return $results;
    }

    public function editResidentNoPic($data){
        $this->db->query('UPDATE resident SET updated_by = :updated_by, last_name = :last_name, first_name = :first_name, middle_name = :middle_name, suffix = :suffix, gender = :gender, birth_date = :birth_date, birth_place = :birth_place, civil_status = :civil_status, nationality = :nationality, religion = :religion,occupation = :occupation, contact_number = :contact_number, pwd = :pwd, pwd_id = :pwd_id, family_monthly_income = :family_monthly_income, indigent = :indigent, solo_parent = :solo_parent, solo_parent_id = :solo_parent_id, pantawid_pamilya = :pantawid_pamilya, voter = :voter, purok = :purok, house_no = :house_no, street = :street, to_contact_fullname = :to_contact_fullname, to_contact_relationship = :to_contact_relationship, to_contact_number = :to_contact_number, to_contact_address = :to_contact_address, national_id_no = :national_id_no, philhealth_no = :philhealth_no, sss_no = :sss_no, pagibig_no = :pagibig_no, tin_no = :tin_no, voter_id_no = :voter_id_no, covid_status = :covid_status, vaccinated = :vaccinated, date_death = :date_death, status = :status  WHERE id = :id ');

        $this->db->bind(':id' , $data['id']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':birth_place', $data['birth_place']);
        $this->db->bind(':civil_status', $data['civil_status']);
        $this->db->bind(':nationality', $data['nationality']);
        $this->db->bind(':religion', $data['religion']);
        $this->db->bind(':occupation', $data['occupation']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':pwd', $data['pwd']);
        $this->db->bind(':pwd_id', $data['pwd_id']);
        $this->db->bind(':family_monthly_income', $data['family_monthly_income']);
        $this->db->bind(':indigent', $data['indigent']);
        $this->db->bind(':solo_parent', $data['solo_parent']);
        $this->db->bind(':solo_parent_id', $data['solo_parent_id']);
        $this->db->bind(':pantawid_pamilya', $data['pantawid_pamilya']);
        $this->db->bind(':voter', $data['voter']);
        $this->db->bind(':purok', $data['purok']);
        $this->db->bind(':house_no', $data['house_no']);
        $this->db->bind(':street', $data['street']);
        $this->db->bind(':to_contact_fullname', $data['to_contact_fullname']);
        $this->db->bind(':to_contact_relationship', $data['to_contact_relationship']);
        $this->db->bind(':to_contact_number', $data['to_contact_number']);
        $this->db->bind(':to_contact_address', $data['to_contact_address']);
        $this->db->bind(':national_id_no', $data['national_id_no']);
        $this->db->bind(':philhealth_no', $data['philhealth_no']);
        $this->db->bind(':sss_no', $data['sss_no']);
        $this->db->bind(':pagibig_no', $data['pagibig_no']);
        $this->db->bind(':tin_no', $data['tin_no']);
        $this->db->bind(':voter_id_no', $data['voter_id_no']);
        $this->db->bind(':covid_status', $data['covid_status']);
        $this->db->bind(':vaccinated', $data['vaccinated']);
        $this->db->bind(':date_death', $data['date_death']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':updated_by', $data['updated_by']);


        if($this->db->execute()){
            return true;
        }else {
            return false;
        }

    }

    public function deleteResident($data){
        $this->db->query('DELETE FROM resident WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function editResident($data){
        $this->db->query('UPDATE resident SET updated_by = :updated_by, last_name = :last_name, first_name = :first_name, middle_name = :middle_name, suffix = :suffix, gender = :gender, birth_date = :birth_date, birth_place = :birth_place, civil_status = :civil_status, nationality = :nationality, religion = :religion,occupation = :occupation, contact_number = :contact_number, pwd = :pwd, pwd_id = :pwd_id, family_monthly_income = :family_monthly_income, indigent = :indigent, solo_parent = :solo_parent, solo_parent_id = :solo_parent_id, pantawid_pamilya = :pantawid_pamilya, voter = :voter, purok = :purok, house_no = :house_no, street = :street, to_contact_fullname = :to_contact_fullname, to_contact_relationship = :to_contact_relationship, to_contact_number = :to_contact_number, to_contact_address = :to_contact_address, national_id_no = :national_id_no, philhealth_no = :philhealth_no, sss_no = :sss_no, pagibig_no = :pagibig_no, tin_no = :tin_no, voter_id_no = :voter_id_no, covid_status = :covid_status, vaccinated = :vaccinated, date_registered = :date_registered, date_death = :date_death, status = :status, profile_pic = :profile_pic  WHERE id = :id ');
        $this->db->bind(':id' , $data['id']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':birth_place', $data['birth_place']);
        $this->db->bind(':civil_status', $data['civil_status']);
        $this->db->bind(':nationality', $data['nationality']);
        $this->db->bind(':religion', $data['religion']);
        $this->db->bind(':occupation', $data['occupation']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':pwd', $data['pwd']);
        $this->db->bind(':pwd_id', $data['pwd_id']);
        $this->db->bind(':family_monthly_income', $data['family_monthly_income']);
        $this->db->bind(':indigent', $data['indigent']);
        $this->db->bind(':solo_parent', $data['solo_parent']);
        $this->db->bind(':solo_parent_id', $data['solo_parent_id']);
        $this->db->bind(':pantawid_pamilya', $data['pantawid_pamilya']);
        $this->db->bind(':voter', $data['voter']);
        $this->db->bind(':purok', $data['purok']);
        $this->db->bind(':house_no', $data['house_no']);
        $this->db->bind(':street', $data['street']);
        $this->db->bind(':to_contact_fullname', $data['to_contact_fullname']);
        $this->db->bind(':to_contact_relationship', $data['to_contact_relationship']);
        $this->db->bind(':to_contact_number', $data['to_contact_number']);
        $this->db->bind(':to_contact_address', $data['to_contact_address']);
        $this->db->bind(':national_id_no', $data['national_id_no']);
        $this->db->bind(':philhealth_no', $data['philhealth_no']);
        $this->db->bind(':sss_no', $data['sss_no']);
        $this->db->bind(':pagibig_no', $data['pagibig_no']);
        $this->db->bind(':tin_no', $data['tin_no']);
        $this->db->bind(':voter_id_no', $data['voter_id_no']);
        $this->db->bind(':covid_status', $data['covid_status']);
        $this->db->bind(':vaccinated', $data['vaccinated']);
        $this->db->bind(':date_registered', $data['date_registered']);
        $this->db->bind(':date_death', $data['date_death']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':profile_pic', $data['profile_pic']);
        $this->db->bind(':updated_by', $data['updated_by']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }



    public function checkResident($data){
        
        $this->db->query('SELECT * FROM resident WHERE last_name = :last_name AND first_name = :first_name AND middle_name = :middle_name AND suffix = :suffix');
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);

        $row = $this->db->single();
        return $row;
    }

    

    public function checkEditResident($data){
        
        $this->db->query('SELECT * FROM resident WHERE last_name = :last_name AND first_name = :first_name AND middle_name = :middle_name AND suffix = :suffix AND id = :id');
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':id', $data['id']);

        $row = $this->db->single();
        return $row;
    }


    public function checkIfVerified($dbResident) {
        $this->db->query('SELECT * FROM user WHERE last_name = :last_name AND first_name = :first_name AND middle_name = :middle_name AND suffix = :suffix AND status = :status');

        //Bind value
        $this->db->bind(':last_name', $dbResident->last_name);
        $this->db->bind(':first_name', $dbResident->first_name);
        $this->db->bind(':middle_name', $dbResident->middle_name);
        $this->db->bind(':suffix', $dbResident->suffix);
        $this->db->bind(':status', 'Verified');

        $row = $this->db->single();
        return $row;
    }


    public function editAccountVerified($accountVerified, $data){
        $this->db->query('UPDATE user SET first_name = :first_name_new, middle_name = :middle_name_new , last_name = :last_name_new, suffix = :suffix_new WHERE first_name = :first_name AND middle_name = :middle_name AND last_name = :last_name AND suffix = :suffix ');

        $this->db->bind(':last_name', $accountVerified->last_name);
        $this->db->bind(':first_name', $accountVerified->first_name);
        $this->db->bind(':middle_name', $accountVerified->middle_name);
        $this->db->bind(':suffix', $accountVerified->suffix);

        $this->db->bind(':last_name_new', $data['last_name']);
        $this->db->bind(':first_name_new', $data['first_name']);
        $this->db->bind(':middle_name_new', $data['middle_name']);
        $this->db->bind(':suffix_new', $data['suffix']);



        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function checkEditResidentById($data){
        
        $this->db->query('SELECT * FROM resident WHERE id = :id');
        $this->db->bind(':id', $data['id']);

        $row = $this->db->single();
        return $row;
    }

}

  
