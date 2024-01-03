<?php
class Facility {
    private $db;

    public function __construct() {
        $this->db = new Database();  // Assuming you have a Database class
    }

    public function getAllRequests() {
        $this->db->query('SELECT * FROM request_facility JOIN facilities ON request_facility.facility_id = facilities.id ORDER BY created_at DESC');
        return $this->db->resultSet();
    }
    public function getFacilityById($id) {
        // Query to fetch facility by id
        $this->db->query('SELECT * FROM request_facility WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single(); // Assuming `single()` fetches a single record
        return $result;
    }


    // Get all facilities
    public function getAllFacilities() {
        // Ensure the column names match exactly with the table
        $this->db->query("SELECT id, Name, Location, Capacity, Date_Added FROM venues");
        return $this->db->resultSet();
    }

    public function addFacilityRequest($data) {
        $this->db->query('INSERT INTO request_facility (facility_id, name, contact, address, datetime, hours, purpose, status) 
                          VALUES (:facility_id, :name, :contact, :address, :datetime, :hours, :purpose, :status)');
    
        // Bind parameters
        $this->db->bind(':facility_id', $data['facility_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':contact', $data['contact']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':datetime', $data['datetime']);
        $this->db->bind(':hours', $data['hours']);
        $this->db->bind(':purpose', $data['purpose']);
        $this->db->bind(':status', $data['status']);
    
        return $this->db->execute();
    }
    public function bookFacility($name, $contact, $address, $datetime, $hours, $purpose, $Name)
{
    $query = 'INSERT INTO request_facility  (name, contact, address, datetime, hours, purpose, facility_id) 
              VALUES (:name, :contact, :address, :datetime, :hours, :purpose, :facility_id)';

    $this->db->query($query);

    // Bind parameters
    $this->db->bind(':name', $name);
    $this->db->bind(':contact', $contact);
    $this->db->bind(':address', $address);
    $this->db->bind(':datetime', $datetime);
    $this->db->bind(':hours', $hours);
    $this->db->bind(':purpose', $purpose);
    $this->db->bind(':Name', $Name);  // Save the facility_id

    // Execute the query
    return $this->db->execute();
}

    
}
