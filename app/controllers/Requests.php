<?php

class Requests extends Controller {
    
    public function __construct() {
        // Load the model (e.g., Request model)
        $this->requestModel = $this->model('Request');
    }

    // This method will fetch and display the facility requests
    public function index() {
        // Get all requests
        $requests = $this->requestModel->getAllRequests();

        // Pass data to the view
        $data = [
            'requests' => $requests
        ];

        // Load the view for requests
        $this->view('requests/index', $data);
    }

    public function approve($id) {
        // Call the model's approve method
        if($this->requestModel->approveRequest($id)) {
            setFlash('Request Approved');
            header('requests/index');
        } else {
            setFlash('Failed to Approve Request');
            header('requests/index');
        }
    }
    
    public function disapprove($id) {
        // Call the model's disapprove method
        if($this->requestModel->disapproveRequest($id)) {
            setFlash('Request Disapproved');
            header('requests/index');
        } else {
            setFlash('Failed to Disapprove Request');
            header('requests/index');
        }
    }
    
    // Assuming the method is in the RequestsController

    public function updateStatus() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"));
    
        if (isset($data->id) && isset($data->status)) {
            if ($this->requestModel->updateStatus($data->id, $data->status)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Database update failed']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid input data']);
        }
    }
    
    


   
    

}
