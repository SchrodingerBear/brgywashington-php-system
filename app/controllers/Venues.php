<?php
class Venues extends Controller {

    public function __construct(){
        // Load the model for Venue
        $this->venueModel = $this->model('Venue');  // Using the Venue model directly
    }

    // Display all venues
    public function index() {
        // Retrieve venue data from the model
        $venues = $this->venueModel->getAllVenues();
    
        // Initialize data array with error keys
        $data = [
            'venues' => $venues,
            'nameError' => '',  // Ensure these error keys are always available
            'locationError' => '',
            'capacityError' => '',
            'Date_Added' => '',  // You can modify this if you need to pass date data
        ];
    
        // Check if there is a form submission or validation error
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle POST request, e.g., validating and processing form data
            $data['nameError'] = 'Name error';  // Example error message, modify as needed
            $data['locationError'] = 'Location error';  // Example error message
            $data['capacityError'] = 'Capacity error';  // Example error message
        }
    
        // Load the view and pass the data array
        $this->view('/venues/index', $data);
    }
    

    // Show the form to add a new venue
    public function add() {
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login"); // Ensure the user is logged in
            exit;
        }

        // Initial data for the add form
        $data = [
            'name' => '',
            'location' => '',
            'capacity' => '',
            'nameError' => '',
            'locationError' => '',
            'capacityError' => ''
        ];

        // Process the form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'name' => trim($_POST['name']),
                'location' => trim($_POST['location']),
                'capacity' => trim($_POST['capacity']),
                'nameError' => '',
                'locationError' => '',
                'capacityError' => ''
            ];

            // Validate the input fields
            if (empty($data['name'])) {
                $data['nameError'] = 'Venue name cannot be empty';
            }

            if (empty($data['location'])) {
                $data['locationError'] = 'Venue location cannot be empty';
            }

            if (empty($data['capacity']) || !is_numeric($data['capacity'])) {
                $data['capacityError'] = 'Capacity must be a number';
            }

            // If no errors, add the venue to the database
            if (empty($data['nameError']) && empty($data['locationError']) && empty($data['capacityError'])) {
                if ($this->venueModel->addVenue($data)) {
                    header("Location: " . URLROOT . "/venues/index");
                    exit;
                } else {
                    die("Something went wrong, please try again!");
                }
            }
        }

        // Load the add venue view with data
        $this->view('/venues/add', $data);
    }

    // Show the form to edit a venue
    public function edit($id) {
        $venue = $this->venueModel->findVenueById($id); // Find the venue by ID

        // Ensure the user is logged in and owns the venue
        if (!isLoggedIn() || $venue->user_id != $_SESSION['user_id']) {
            header("Location: " . URLROOT . "/venues/index");
            exit;
        }

        $data = [
            'id' => $venue->id,
            'name' => $venue->name,
            'location' => $venue->location,
            'capacity' => $venue->capacity,
            'nameError' => '',
            'locationError' => '',
            'capacityError' => ''
        ];

        // Process the form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $venue->id,
                'user_id' => $_SESSION['user_id'],
                'name' => trim($_POST['name']),
                'location' => trim($_POST['location']),
                'capacity' => trim($_POST['capacity']),
                'nameError' => '',
                'locationError' => '',
                'capacityError' => ''
            ];

            // Validate the input fields
            if (empty($data['name'])) {
                $data['nameError'] = 'Venue name cannot be empty';
            }

            if (empty($data['location'])) {
                $data['locationError'] = 'Venue location cannot be empty';
            }

            if (empty($data['capacity']) || !is_numeric($data['capacity'])) {
                $data['capacityError'] = 'Capacity must be a number';
            }

            // If no errors, update the venue in the database
            if (empty($data['nameError']) && empty($data['locationError']) && empty($data['capacityError'])) {
                if ($this->venueModel->updateVenue($data)) {
                    header("Location: " . URLROOT . "/venues/index");
                    exit;
                } else {
                    die("Something went wrong, please try again!");
                }
            }
        }

        // Load the edit venue view with data
        $this->view('/venues/edit', $data);
    }

    // Delete a venue
    public function delete($id = null) {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login");
            exit;
        }
    
        // Debug the $id parameter
        if (!$id) {
            die('Error: ID is not provided or is invalid.');
        }
    
        $venue = $this->venueModel->findVenueById($id);
    
        if (!$venue) {
            die('Error: Venue not found.');
        }
    
        // Ensure user authorization
        if ($venue->user_id != $_SESSION['user_id']) {
            header("Location: " . URLROOT . "/venues/index");
            exit;
        }
    
        // Handle deletion
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->venueModel->deleteVenue($id)) {
                header("Location: " . URLROOT . "/venues/index");
                exit;
            } else {
                die('Error: Could not delete the venue.');
            }
        }
    }
    
}
?>
