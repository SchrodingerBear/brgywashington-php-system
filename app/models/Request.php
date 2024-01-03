<?php

class Request {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Assuming this method is in the RequestModel

    public function updateStatus($id, $status) {
        $this->db->query("UPDATE request_facility SET status = :status WHERE id = :id");
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    
    
    


    // General method to change the request status
    
    // Method to fetch all requests
    public function getAllRequests() {
        $this->db->query('SELECT * FROM request_facility');
        return $this->db->resultSet();
    }

    // Approve the request (calls changeRequestStatus with status 1)
    public function approveRequest($id) {
        return $this->changeRequestStatus($id, 1); // 1 = Approved
    }
    
    // Disapprove the request (calls changeRequestStatus with status 2)
    public function disapproveRequest($id) {
        return $this->changeRequestStatus($id, 2); // 2 = Disapproved
    }
}
