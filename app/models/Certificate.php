<?php
class Certificate {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function findAllWalkInCertificate() {
        
        $this->db->query('SELECT walk_in.id, indigency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM indigency 
        INNER JOIN walk_in ON walk_in.form_id = indigency.id  
        WHERE walk_in.form_type = :formIndigency
        UNION 
        SELECT walk_in.id, permit.id as form_id , last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM permit
        INNER JOIN walk_in ON walk_in.form_id = permit.id 
        WHERE walk_in.form_type = :formPermit
        UNION 
        SELECT walk_in.id, residency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM residency
        INNER JOIN walk_in ON walk_in.form_id = residency.id 
        WHERE walk_in.form_type = :formResidency
        UNION 
        SELECT walk_in.id, clearance.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM clearance
        INNER JOIN walk_in ON walk_in.form_id = clearance.id 
        WHERE walk_in.form_type = :formClearance
        UNION 
        SELECT walk_in.id, clearance_id.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM clearance_id
        INNER JOIN walk_in ON walk_in.form_id = clearance_id.id 
        WHERE walk_in.form_type = :formClearance_id
        ORDER BY date_created DESC ');


        
        $this->db->bind(':formIndigency', 'Barangay Indigency');
        $this->db->bind(':formPermit', 'Barangay Permit');
        $this->db->bind(':formResidency', 'Barangay Residency');
        $this->db->bind(':formClearance', 'Barangay Clearance');
        $this->db->bind(':formClearance_id', 'Barangay Clearance-ID');

        

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllRequestCertificate($data) {
        
        $this->db->query('SELECT request.id, indigency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,  feedback FROM indigency 
        INNER JOIN request ON request.form_id = indigency.id  
        WHERE request.form_type = :formIndigency AND request.req_status = :req_status
        UNION 
        SELECT request.id, permit.id as form_id , last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,  feedback FROM permit
        INNER JOIN request ON request.form_id = permit.id 
        WHERE request.form_type = :formPermit AND request.req_status = :req_status
        UNION 
        SELECT request.id, residency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status, feedback FROM residency
        INNER JOIN request ON request.form_id = residency.id 
        WHERE request.form_type = :formResidency AND request.req_status = :req_status
        UNION 
        SELECT request.id, clearance.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,  feedback FROM clearance
        INNER JOIN request ON request.form_id = clearance.id 
        WHERE request.form_type = :formClearance AND request.req_status = :req_status
        UNION 
        SELECT request.id, clearance_id.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,   feedback FROM clearance_id
        INNER JOIN request ON request.form_id = clearance_id.id 
        WHERE request.form_type = :formClearance_id AND request.req_status = :req_status
        ORDER BY date_created DESC ');


        
        $this->db->bind(':formIndigency', 'Barangay Indigency');
        $this->db->bind(':formPermit', 'Barangay Permit');
        $this->db->bind(':formResidency', 'Barangay Residency');
        $this->db->bind(':formClearance', 'Barangay Clearance');
        $this->db->bind(':formClearance_id', 'Barangay Clearance-ID');

        $this->db->bind(':req_status', $data['req_status']);

        

        $results = $this->db->resultSet();

        return $results;
    }


    public function findCertificateById($data) {

        switch($data['form_type'])
        {

            
            case 'indigency':
                if($data['req']){
                    $this->db->query('SELECT * FROM indigency 
                    INNER JOIN request ON request.form_id = indigency.id  
                    WHERE request.form_type = :formIndigency AND control = :id');
                    
                    $this->db->bind(':formIndigency', 'Barangay Indigency');
                    $this->db->bind(':id', $data['id']);

                }else{
                    $this->db->query('SELECT * FROM indigency WHERE control = :id AND user_id = :user_id');
                    $this->db->bind(':id', $data['id']);
                    $this->db->bind(':user_id', 0);
                }

                $row = $this->db->single();
                return $row;
                break;

            case 'permit':
                if($data['req']){

                    $this->db->query('SELECT * FROM permit 
                    INNER JOIN request ON request.form_id = permit.id  
                    WHERE request.form_type = :formPermit AND control = :id');
                    
                    $this->db->bind(':formPermit', 'Barangay Permit');
                    $this->db->bind(':id', $data['id']);

                }else{
                    $this->db->query('SELECT * FROM permit WHERE control = :id AND user_id = :user_id');
                    $this->db->bind(':id', $data['id']);
                    $this->db->bind(':user_id', 0);
                }

                $row = $this->db->single();
                return $row;
                break;

            case 'residency':
                if($data['req']){

                    $this->db->query('SELECT * FROM residency 
                    INNER JOIN request ON request.form_id = residency.id  
                    WHERE request.form_type = :formResidency AND control = :id');

                    $this->db->bind(':formResidency', 'Barangay Residency');
                    $this->db->bind(':id', $data['id']);

                }else{
                    $this->db->query('SELECT * FROM residency WHERE control = :id AND user_id = :user_id');
                    $this->db->bind(':id', $data['id']);
                    $this->db->bind(':user_id', 0);
                }

                $row = $this->db->single();
                return $row;
                break;

            case 'clearance':
                if($data['req']){

                    $this->db->query('SELECT * FROM clearance 
                    INNER JOIN request ON request.form_id = clearance.id  
                    WHERE request.form_type = :formClearance AND control = :id');
                    
                    $this->db->bind(':formClearance', 'Barangay Clearance');
                    $this->db->bind(':id', $data['id']);

                }else{
                    $this->db->query('SELECT * FROM clearance WHERE control = :id AND user_id = :user_id');
                    $this->db->bind(':id', $data['id']);
                    $this->db->bind(':user_id', 0);
                }

                $row = $this->db->single();
                return $row;
                break;

            case 'clearance_id':
                if($data['req']){

                    $this->db->query('SELECT * FROM clearance_id 
                    INNER JOIN request ON request.form_id = clearance_id.id  
                    WHERE request.form_type = :formClearanceId AND control = :id');

                    $this->db->bind(':formClearanceId', 'Barangay Clearance-ID');
                    $this->db->bind(':id', $data['id']);

                }else{
                    $this->db->query('SELECT * FROM clearance_id WHERE control = :id AND user_id = :user_id');
                    $this->db->bind(':id', $data['id']);
                    $this->db->bind(':user_id', 0);
                }

                $row = $this->db->single();
                return $row;
                break;

        }


 
    }

    public function addCertificate($data) {

        switch($data['table_name']){

            case 'walk_in':
            $this->db->query('INSERT INTO walk_in (user_id,form_id, form_type, qty, status) VALUES (:user_id, :form_id, :form_type, :qty, :status)');
            
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':form_id', $data['formId']);
            $this->db->bind(':form_type', $data['form_type']);
            //$this->db->bind(':date_created', 1);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':status', 'success');

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
            break;

        case 'request':
            $this->db->query('INSERT INTO request (user_id,form_id, form_type, req_status, feedback, qty) VALUES (:user_id, :form_id, :form_type, :req_status,  :feedback,:qty)');
        
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':form_id', $data['formId']);
            $this->db->bind(':form_type', $data['form_type']);
            $this->db->bind(':req_status','wait for approval');
            $this->db->bind(':feedback','');
            $this->db->bind(':qty', $data['qty']);
    
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
            break;

            

        }
    }


    public function addIndigency($data) {

        $this->db->query('INSERT INTO indigency (user_id, last_name, first_name, middle_name, suffix, contact_number, purpose) VALUES (:user_id, :last_name, :first_name, :middle_name, :suffix, :contact_number, :purpose)');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':purpose', $data['purpose']);
        

        if($this->db->execute()){
            return true;
        }else {

            return false;
        }
    }

    public function addPermit($data) {

        $this->db->query('INSERT INTO permit (user_id, last_name, first_name, middle_name, suffix, contact_number, business_name, oper_lastname, oper_firstname, oper_middlename, oper_suffix, purpose) VALUES (:user_id, :last_name, :first_name, :middle_name, :suffix, :contact_number, :business_name, :oper_lastname, :oper_firstname, :oper_middlename, :oper_suffix, :purpose)');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':business_name', $data['business_name']);
        $this->db->bind(':oper_lastname', $data['oper_lastname']);
        $this->db->bind(':oper_firstname', $data['oper_firstname']);
        $this->db->bind(':oper_middlename', $data['oper_middlename']);
        $this->db->bind(':oper_suffix', $data['oper_suffix']);
        $this->db->bind(':purpose', $data['purpose']);


        

        if($this->db->execute()){
            return true;
        }else {

            return false;
        }
    }

    public function addResidency($data) {

        $this->db->query('INSERT INTO residency (user_id, last_name, first_name, middle_name, suffix, gender, birth_date, birth_place, contact_number, father_lastname, father_firstname, father_middlename, father_suffix, mother_maidenname, mother_firstname, mother_middlename, mother_suffix,  purpose) VALUES (:user_id, :last_name, :first_name, :middle_name, :suffix, :gender, :birth_date, :birth_place, :contact_number, :faLastName, :faFirstName, :faMiddleName, :faSuffix, :moMaidenName, :moFirstName, :moMiddleName, :moSuffix, :purpose)');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':birth_place', $data['birth_place']);
        $this->db->bind(':faLastName', $data['faLastName']);
        $this->db->bind(':faFirstName', $data['faFirstName']);
        $this->db->bind(':faMiddleName', $data['faMiddleName']);
        $this->db->bind(':faSuffix', $data['faSuffix']);
        $this->db->bind(':moMaidenName', $data['moMaidenName']);
        $this->db->bind(':moFirstName', $data['moFirstName']);
        $this->db->bind(':moMiddleName', $data['moMiddleName']);
        $this->db->bind(':moSuffix', $data['moSuffix']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':purpose', $data['purpose']);
        

        if($this->db->execute()){
            return true;
        }else {

            return false;
        }
    }

    public function addClearance($data) {

        $this->db->query('INSERT INTO clearance (user_id, last_name, first_name, middle_name, suffix, contact_number, purpose, permit_to) VALUES (:user_id, :last_name, :first_name, :middle_name, :suffix, :contact_number, :purpose, :permit_to)');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':purpose', $data['purpose']);
        $this->db->bind(':permit_to', $data['permit_to']);
        

        if($this->db->execute()){
            return true;
        }else {

            return false;
        }
    }

    public function addClearanceId($data) {

        $this->db->query('INSERT INTO clearance_id (user_id, id_no, id_pic, gender, civil_status, birth_date, birth_place, address, last_name, first_name, middle_name, suffix, contact_number, purpose, permit_to) VALUES (:user_id,:id_no, :id_pic, :gender, :civil_status, :birth_date, :birth_place, :address, :last_name, :first_name, :middle_name, :suffix, :contact_number, :purpose, :permit_to)');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':id_no', $data['id_no']);
        $this->db->bind(':id_pic', $data['id_pic']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':civil_status', $data['civil_status']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':birth_place', $data['birth_place']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':suffix', $data['suffix']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':purpose', $data['purpose']);
        $this->db->bind(':permit_to', $data['permit_to']);
        

        if($this->db->execute()){
            return true;
        }else {

            return false;
        }
    }


    public function getFormId($data) {
        switch($data['table_name'])
        {

            case 'request':
                $this->db->query('SELECT id FROM request WHERE user_id = :user_id AND form_id = :form_id AND form_type = :form_type');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':form_id', $data['formId']);
                $this->db->bind(':form_type', $data['form_type']);
                
                $row = $this->db->single();
                return $row; 
                break;

            case 'walk_in':
                $this->db->query('SELECT id FROM walk_in WHERE user_id = :user_id AND form_id = :form_id AND form_type = :form_type');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':form_id', $data['formId']);
                $this->db->bind(':form_type', $data['form_type']);
                
                $row = $this->db->single();
                return $row; 
                break;



            case 'indigency':
                $this->db->query('SELECT id FROM indigency WHERE user_id = :user_id AND control = :control');
                $this->db->bind(':user_id',$_SESSION['user_id']); 
                $this->db->bind(':control', '');
        
                $row = $this->db->single();
                return $row; 
                break;

            case 'permit':
                $this->db->query('SELECT id FROM permit WHERE user_id = :user_id AND control = :control');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':control', '');
        
                $row = $this->db->single();
                return $row; 
                break;

            case 'residency':
                $this->db->query('SELECT id FROM residency WHERE user_id = :user_id AND control = :control');
                $this->db->bind(':user_id',$_SESSION['user_id']);
                $this->db->bind(':control', '');
        
                $row = $this->db->single();
                return $row; 
                break;

            case 'clearance':
                $this->db->query('SELECT id FROM clearance WHERE user_id = :user_id AND control = :control');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':control', '');
        
                $row = $this->db->single();
                return $row; 
                break;

            case 'clearance_id':
                $this->db->query('SELECT id FROM clearance_id WHERE user_id = :user_id AND control = :control');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':control', '');
        
                $row = $this->db->single();
                return $row; 
                break;


        }

    }

    public function addIdControl($data) {
        
        switch($data['table_name'])
        {
            case 'indigency':
                $this->db->query('UPDATE indigency SET control = :insert_control WHERE user_id = :user_id AND control = :control ');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':control', '');
                $this->db->bind(':insert_control', $data['formId']);
                break;
                


            case 'permit':
                $this->db->query('UPDATE permit SET control = :insert_control WHERE user_id = :user_id AND control = :control ');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':control', '');
                $this->db->bind(':insert_control', $data['formId']);
                break;

            case 'residency':
                $this->db->query('UPDATE residency SET control = :insert_control WHERE user_id = :user_id AND control = :control ');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':control', '');
                $this->db->bind(':insert_control', $data['formId']);
                break;

            case 'clearance':
                $this->db->query('UPDATE clearance SET control = :insert_control WHERE user_id = :user_id AND control = :control ');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':control', '');
                $this->db->bind(':insert_control', $data['formId']);
                break;

            case 'clearance_id':
                $this->db->query('UPDATE clearance_id SET control = :insert_control WHERE user_id = :user_id AND control = :control ');
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':control', '');
                $this->db->bind(':insert_control', $data['formId']);
                break;

        }

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }

    }


    public function getLastId($data){

        switch($data['table_name']){


            case 'indigency':
                $this->db->query('SELECT * FROM indigency ORDER BY id DESC LIMIT 1');

                $row = $this->db->single();
                return $row;
                break;

            case 'permit':
                $this->db->query('SELECT * FROM permit ORDER BY id DESC LIMIT 1');

                $row = $this->db->single();
                return $row;
                break;

            case 'residency':
                $this->db->query('SELECT * FROM residency ORDER BY id DESC LIMIT 1');

                $row = $this->db->single();
                return $row;
                break;

            case 'clearance':
                $this->db->query('SELECT * FROM clearance ORDER BY id DESC LIMIT 1');

                $row = $this->db->single();
                return $row;
                break;

            case 'clearance_id':
                $this->db->query('SELECT * FROM clearance_id ORDER BY id DESC LIMIT 1');

                $row = $this->db->single();
                return $row;
                break;


        }


    }

    public function updateStatus($data) {

        $this->db->query('UPDATE request SET req_status = :req_status, feedback = :feedback WHERE id = :control ');
        $this->db->bind(':req_status',$data['req_status']);
        $this->db->bind(':control', $data['control'] );
        $this->db->bind(':feedback', $data['feedback']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }


        
    }

    public function cancelRequest($data) {

        $this->db->query('UPDATE request SET req_status = :req_status WHERE id = :id ');
        $this->db->bind(':req_status','Cancelled');
        $this->db->bind(':id', $data['id'] );

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
        
    }

    public function updateRequest($data) {

            $this->db->query('UPDATE request SET req_status = :req_status, feedback = :feedback WHERE id = :control ');
            $this->db->bind(':req_status',$data['req_status']);
            $this->db->bind(':control', $data['control'] );
            $this->db->bind(':feedback', $data['feedback']);

    
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }


            
    }

    public function updateRequestQty($data) {

        $this->db->query('UPDATE request SET req_status = :req_status, qty = :qty  WHERE id = :control ');
        $this->db->bind(':req_status',$data['req_status']);
        $this->db->bind(':control', $data['control'] );
        $this->db->bind(':qty', $data['qty'] );


        if($this->db->execute()){
            return true;
        }else {
            return false;
        }


        
}

    public function updateComplete($data) {

        $this->db->query('UPDATE request SET req_status = :req_status WHERE id = :control ');
        $this->db->bind(':req_status',$data['req_status']);
        $this->db->bind(':control', $data['control'] );



        if($this->db->execute()){
            return true;
        }else {
            return false;
        }


        
}
    
    public function updateRequestByUser($data){

        switch($data['table_name']){

            case 'indigency':
                $this->db->query('UPDATE indigency SET last_name = :last_name, first_name = :first_name, middle_name = :middle_name, suffix = :suffix, contact_number = :contact_number, purpose = :purpose WHERE control = :control');
                $this->db->bind(':last_name', $data['last_name']);
                $this->db->bind(':first_name', $data['first_name']);
                $this->db->bind(':middle_name', $data['middle_name']);
                $this->db->bind(':suffix', $data['suffix']);
                $this->db->bind(':contact_number', $data['contact_number']);
                $this->db->bind(':purpose', $data['purpose']);
                $this->db->bind(':control', $data['control'] );

                break;
                

            case 'permit':
                $this->db->query('UPDATE permit SET last_name = :last_name, first_name = :first_name, middle_name = :middle_name, suffix = :suffix, contact_number = :contact_number, business_name = :business_name, oper_lastname = :oper_lastname, oper_middlename = :oper_middlename, oper_firstname = :oper_firstname, oper_suffix = :oper_suffix, purpose = :purpose WHERE control = :control');
                $this->db->bind(':last_name', $data['last_name']);
                $this->db->bind(':first_name', $data['first_name']);
                $this->db->bind(':middle_name', $data['middle_name']);
                $this->db->bind(':suffix', $data['suffix']);
                $this->db->bind(':contact_number', $data['contact_number']);

                $this->db->bind(':business_name', $data['business_name']);
                $this->db->bind(':oper_lastname', $data['oper_lastname']);
                $this->db->bind(':oper_firstname', $data['oper_firstname']);
                $this->db->bind(':oper_middlename', $data['oper_middlename']);
                $this->db->bind(':oper_suffix', $data['oper_suffix']);
                $this->db->bind(':purpose', $data['purpose']);
                $this->db->bind(':control', $data['control'] );
    
                break;



         case 'clearance':
                $this->db->query('UPDATE clearance SET last_name = :last_name, first_name = :first_name, middle_name = :middle_name, suffix = :suffix, contact_number = :contact_number, purpose = :purpose, permit_to = :permit_to WHERE control = :control');
                $this->db->bind(':last_name', $data['last_name']);
                $this->db->bind(':first_name', $data['first_name']);
                $this->db->bind(':middle_name', $data['middle_name']);
                $this->db->bind(':suffix', $data['suffix']);
                $this->db->bind(':contact_number', $data['contact_number']);
                $this->db->bind(':purpose', $data['purpose']);
                $this->db->bind(':permit_to', $data['permit_to']);
                $this->db->bind(':control', $data['control'] );

                break;

        

            case 'residency':
                $this->db->query('UPDATE residency SET last_name = :last_name, first_name = :first_name, middle_name = :middle_name, suffix = :suffix, contact_number = :contact_number, gender = :gender, birth_date = :birth_date, birth_place = :birth_place, father_lastname = :faLastName, father_firstname = :faFirstName, father_middlename = :faMiddleName, father_suffix = :faSuffix, mother_maidenname = :moMaidenName, mother_firstname = :moFirstName, mother_middlename = :moMiddleName, mother_suffix = :moSuffix, purpose = :purpose WHERE control = :control');

                $this->db->bind(':last_name', $data['last_name']);
                $this->db->bind(':first_name', $data['first_name']);
                $this->db->bind(':middle_name', $data['middle_name']);
                $this->db->bind(':suffix', $data['suffix']);
                $this->db->bind(':gender', $data['gender']);
                $this->db->bind(':birth_date', $data['birth_date']);
                $this->db->bind(':birth_place', $data['birth_place']);
                $this->db->bind(':faLastName', $data['faLastName']);
                $this->db->bind(':faFirstName', $data['faFirstName']);
                $this->db->bind(':faMiddleName', $data['faMiddleName']);
                $this->db->bind(':faSuffix', $data['faSuffix']);
                $this->db->bind(':moMaidenName', $data['moMaidenName']);
                $this->db->bind(':moFirstName', $data['moFirstName']);
                $this->db->bind(':moMiddleName', $data['moMiddleName']);
                $this->db->bind(':moSuffix', $data['moSuffix']);
                $this->db->bind(':contact_number', $data['contact_number']);
                $this->db->bind(':purpose', $data['purpose']);
                $this->db->bind(':control', $data['control'] );

                break;

                case 'clearance_id':
                    $this->db->query('UPDATE clearance_id SET id_pic = :id_pic, last_name = :last_name, first_name = :first_name, middle_name = :middle_name, suffix = :suffix, birth_date = :birth_date, birth_place = :birth_place, gender = :gender, contact_number = :contact_number, civil_status = :civil_status, purpose = :purpose, permit_to = :permit_to WHERE control = :control');
                    $this->db->bind(':id_pic', $data['id_pic']);
                    $this->db->bind(':last_name', $data['last_name']);
                    $this->db->bind(':first_name', $data['first_name']);
                    $this->db->bind(':middle_name', $data['middle_name']);
                    $this->db->bind(':suffix', $data['suffix']);
                    $this->db->bind(':gender', $data['gender']);
                    $this->db->bind(':birth_date', $data['birth_date']);
                    $this->db->bind(':birth_place', $data['birth_place']);
                    $this->db->bind(':civil_status', $data['civil_status']);
                    $this->db->bind(':contact_number', $data['contact_number']);
                    $this->db->bind(':purpose', $data['purpose']);
                    $this->db->bind(':permit_to', $data['permit_to']);
                    $this->db->bind(':control', $data['control'] );
    
                    break;
        }

        if($this->db->execute()){
            return true;

        }else {
            return false;
        }

    }


    public function findMyRequest($data) {
        
        $this->db->query('SELECT request.id, indigency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,  feedback FROM indigency 
        INNER JOIN request ON request.form_id = indigency.id  
        WHERE request.form_type = :formIndigency AND request.req_status = :req_status AND request.user_id = :user_id
        UNION 
        SELECT request.id, permit.id as form_id , last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,  feedback FROM permit
        INNER JOIN request ON request.form_id = permit.id 
        WHERE request.form_type = :formPermit AND request.req_status = :req_status AND request.user_id = :user_id
        UNION 
        SELECT request.id, residency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status, feedback FROM residency
        INNER JOIN request ON request.form_id = residency.id 
        WHERE request.form_type = :formResidency AND request.req_status = :req_status AND request.user_id = :user_id
        UNION 
        SELECT request.id, clearance.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status, feedback FROM clearance
        INNER JOIN request ON request.form_id = clearance.id 
        WHERE request.form_type = :formClearance AND request.req_status = :req_status AND request.user_id = :user_id
        UNION 
        SELECT request.id, clearance_id.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status, feedback FROM clearance_id
        INNER JOIN request ON request.form_id = clearance_id.id 
        WHERE request.form_type = :formClearance_id AND request.req_status = :req_status AND request.user_id = :user_id
        ORDER BY date_created DESC ');


        
        $this->db->bind(':formIndigency', 'Barangay Indigency');
        $this->db->bind(':formPermit', 'Barangay Permit');
        $this->db->bind(':formResidency', 'Barangay Residency');
        $this->db->bind(':formClearance', 'Barangay Clearance');
        $this->db->bind(':formClearance_id', 'Barangay Clearance-ID');
        $this->db->bind(':user_id', $_SESSION['user_id']);

        $this->db->bind(':req_status', $data['req_status']);

        

        $results = $this->db->resultSet();

        return $results;
    }


    public function clearanceIdDetails($data){
        $this->db->query('SELECT * FROM clearance_id WHERE control = :id');
        $this->db->bind(':id', $data['id']);

        $row = $this->db->single();

        return $row;
    }

    public function loadResident($data){
        $this->db->query("SELECT * FROM resident WHERE last_name LIKE :last_name AND first_name  LIKE :first_name AND middle_name LIKE :middle_name AND suffix  = :suffix ");
        $this->db->bind(':last_name', '%'.$data["last_name"] . '%');
        $this->db->bind(':first_name', '%'.$data["first_name"] . '%');
        $this->db->bind(':middle_name', '%'.$data["middle_name"] . '%');
        $this->db->bind(':suffix',  $data["suffix"] );
        
        $results = $this->db->single();

        return $results;

    }





    public function findAllWalkInCertificateOrderByName($data) {
        
        $this->db->query('SELECT walk_in.id, indigency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM indigency 
        INNER JOIN walk_in ON walk_in.form_id = indigency.id  
        WHERE walk_in.form_type = :formIndigency AND date_created >= :date_start AND date_created < :date_end
        UNION 
        SELECT walk_in.id, permit.id as form_id , last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM permit
        INNER JOIN walk_in ON walk_in.form_id = permit.id 
        WHERE walk_in.form_type = :formPermit AND date_created >= :date_start AND date_created < :date_end
        UNION 
        SELECT walk_in.id, residency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM residency
        INNER JOIN walk_in ON walk_in.form_id = residency.id 
        WHERE walk_in.form_type = :formResidency AND date_created >= :date_start AND date_created < :date_end
        UNION 
        SELECT walk_in.id, clearance.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM clearance
        INNER JOIN walk_in ON walk_in.form_id = clearance.id 
        WHERE walk_in.form_type = :formClearance AND date_created >= :date_start AND date_created < :date_end
        UNION 
        SELECT walk_in.id, clearance_id.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, status FROM clearance_id
        INNER JOIN walk_in ON walk_in.form_id = clearance_id.id 
        WHERE walk_in.form_type = :formClearance_id AND date_created >= :date_start AND date_created < :date_end
        ORDER BY last_name ASC ');


        
        $this->db->bind(':formIndigency', 'Barangay Indigency');
        $this->db->bind(':formPermit', 'Barangay Permit');
        $this->db->bind(':formResidency', 'Barangay Residency');
        $this->db->bind(':formClearance', 'Barangay Clearance');
        $this->db->bind(':formClearance_id', 'Barangay Clearance-ID');

        $this->db->bind(':date_start', $data['year']. '/1/1');
        $this->db->bind(':date_end', $data['yearEnd']. '/1/1');
        

        $results = $this->db->resultSet();

        return $results;
    }


    public function countWalkInCertificate($data){

        $this->db->query('SELECT * FROM walk_in WHERE date_created >= :date_start AND date_created < :date_end');

        $this->db->bind(':date_start', $data['year']. '/1/1');
        $this->db->bind(':date_end', $data['yearEnd']. '/1/1');


        return $this->db->rowCount();

    }

    public function findAllRequestCertificateOrderByName($data) {
        
        $this->db->query('SELECT request.id, indigency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,  feedback FROM indigency 
        INNER JOIN request ON request.form_id = indigency.id  
        WHERE request.form_type = :formIndigency AND request.req_status = :req_status AND date_created >= :date_start AND date_created < :date_end
        UNION 
        SELECT request.id, permit.id as form_id , last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,  feedback FROM permit
        INNER JOIN request ON request.form_id = permit.id 
        WHERE request.form_type = :formPermit AND request.req_status = :req_status AND date_created >= :date_start AND date_created < :date_end
        UNION 
        SELECT request.id, residency.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status, feedback FROM residency
        INNER JOIN request ON request.form_id = residency.id 
        WHERE request.form_type = :formResidency AND request.req_status = :req_status AND date_created >= :date_start AND date_created < :date_end
        UNION 
        SELECT request.id, clearance.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,  feedback FROM clearance
        INNER JOIN request ON request.form_id = clearance.id 
        WHERE request.form_type = :formClearance AND request.req_status = :req_status AND date_created >= :date_start AND date_created < :date_end
        UNION 
        SELECT request.id, clearance_id.id as form_id, last_name, first_name, middle_name, suffix, form_type, purpose, date_created, qty, req_status,   feedback FROM clearance_id
        INNER JOIN request ON request.form_id = clearance_id.id 
        WHERE request.form_type = :formClearance_id AND request.req_status = :req_status  AND date_created > :date_start AND date_created < :date_end
        ORDER BY date_created DESC ');


        
        $this->db->bind(':formIndigency', 'Barangay Indigency');
        $this->db->bind(':formPermit', 'Barangay Permit');
        $this->db->bind(':formResidency', 'Barangay Residency');
        $this->db->bind(':formClearance', 'Barangay Clearance');
        $this->db->bind(':formClearance_id', 'Barangay Clearance-ID');

        $this->db->bind(':req_status', 'Completed');

        

        $this->db->bind(':date_start', $data['year']. '/1/1');
        $this->db->bind(':date_end', $data['yearEnd']. '/1/1');
        

        $results = $this->db->resultSet();

        return $results;
    }


    public function countRequestCertificate($data){

        $this->db->query('SELECT * FROM request WHERE date_created >= :date_start AND date_created < :date_end AND req_status = :req_status');

        $this->db->bind(':date_start', $data['year']. '/1/1');
        $this->db->bind(':date_end', $data['yearEnd']. '/1/1');
        $this->db->bind(':req_status', 'Completed');



        return $this->db->rowCount();

    }



    

}
