<?php
class Venue {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Assuming you have a Database class for database interaction
    }

    // Find all venues
    public function findAllVenues() {
        $this->db->query("SELECT * FROM venues");
        return $this->db->resultSet();
    }

    public function getAllVenues() {
        // SQL query to select all venues
        $query = "SELECT * FROM venues";

        $this->db->query($query);
        $result = $this->db->resultSet();

        return $result;
    
    }
    // Find a venue by ID
    public function findVenueById($id) {
        $this->db->query("SELECT * FROM venues WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Add a new venue
    public function addVenue($data) {
        $this->db->query("INSERT INTO venues (name, location, capacity, Date_Added) 
                          VALUES (:name, :location, :capacity, NOW())");
        // Bind the parameters
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':capacity', $data['capacity']);
    
        // Execute the query
        return $this->db->execute();
    }
    
    // Update an existing venue
    public function updateVenue($data) {
        $this->db->query("UPDATE venues SET name = :name, location = :location, capacity = :capacity WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':capacity', $data['capacity']);

        return $this->db->execute();
    }

    // Delete a venue
    public function deleteVenue($id) {
        $this->db->query("DELETE FROM venues WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
