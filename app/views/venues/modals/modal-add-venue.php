<?php
// Include database connection
require_once('../app/libraries/Database.php');

// Create a new instance of the Database class
$db = new Database();

// Initialize default values
$logo = 'public/img/default_logo.png';
$mobile_number = 'Not Available';
$email = 'Not Available';
$address = 'Not Available';
$brgy_name = 'Not Available';
$about = 'Not Available';
$province = 'Not Available';
$municipality = 'Not Available';

// Fetch data from the database using PDO
$sql = "SELECT brgy_name, pic_logo, about,province, municipality, mobile_number, address, email FROM brgy_detail LIMIT 1";
$db->query($sql);

$row = $db->single(); // Fetch a single record as an object

if ($row) {
    // Construct the URL for the logo and update other variables
    $logo = !empty($row->pic_logo) ? 'public/img/' . $row->pic_logo : $logo;
    $mobile_number = $row->mobile_number ?? $mobile_number;
    $email = $row->email ?? $email;
    $address = $row->address ?? $address;
    $brgy_name = $row->brgy_name ?? $brgy_name;
    $about = $row->about ?? $about;
    $province = $row->province ?? $province;
    $municipality = $row->municipality ?? $municipality;
}
?>



<div class="modal fade" id="modalAddVenue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="manageDetails">Add New Facility</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body overflow-hidden">
                <form action="<?php echo URLROOT; ?>/venues/add" method="POST">
                    <div class="row g-4">

                        <!-- Left Column (Image and Branding) -->
                        <div class="col-sm-12 col-md-12 col-lg-2">
                            <div class="row g-2 p-3 border border-2 rounded-3">
                                <h6>BRGY <?php echo htmlspecialchars($brgy_name); ?></h6>
                                <div class="d-grid gap-2 col-12 mx-auto">
                                    <img src="<?php echo URLROOT . '/' . htmlspecialchars($logo) . '?v=' . time(); ?>" class="img-thumbnail align-center" alt="">
                                </div>
                                <div class="col col-md-12">
                                    <!-- Branding or additional info can go here -->
                                </div>
                            </div>
                        </div>

                        <!-- Right Column (Venue Form) -->
                        <div class="col-sm-12 col-md-12 col-lg-10">
                            <div class="row g-2 p-3 border border-2 rounded-3">
                                <h6>Facility Details</h6>
                                
                                <!-- Venue Name -->
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="inputName" class="col-form-label-sm">Facility Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" required>
                                    <span class="text-danger"><?php echo $data['nameError'] ?? ''; ?></span>
                                </div>
                                
                                <!-- Venue Location -->
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="inputLocation" class="col-form-label-sm">Location</label>
                                    <input type="text" name="location" class="form-control" id="inputLocation" value="<?php echo isset($data['location']) ? $data['location'] : ''; ?>" required>
                                    <span class="text-danger"><?php echo $data['locationError'] ?? ''; ?></span>
                                </div>

                                <!-- Venue Capacity -->
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="inputCapacity" class="col-form-label-sm">Rate per hour</label>
                                    <input type="number" name="capacity" class="form-control" id="inputCapacity" value="<?php echo isset($data['capacity']) ? $data['capacity'] : ''; ?>" required>
                                    <span class="text-danger"><?php echo $data['capacityError'] ?? ''; ?></span>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success add_success"><i class="fas fa-save"></i> Add Venue</button>
            </div>
            </form>
        </div>
    </div>
</div>
