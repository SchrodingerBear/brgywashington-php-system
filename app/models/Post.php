<?php
class Post {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function findAllPost() {
        $this->db->query('SELECT * FROM posts ORDER BY created_at ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addPost($data) {
        // Prepare the SQL query
        $this->db->query('INSERT INTO posts (user_id, title, body, created_at) 
                          VALUES (:user_id, :title, :body, NOW())');
        
        // Bind the parameters to the query
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        // Execute the query and return the result
        return $this->db->execute();
    

    }

    public function findPostById($data) {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $data['id']);

        $row = $this->db->single();

        return $row;
 
    }

    public function updatePost($data){
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

      
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function deletePost($data){
        $this->db->query('DELETE FROM posts WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }
}