<?php require APPROOT . '/views/includes/head.php'; ?>

<?php
if ($_SESSION['account_type'] == 0) {
    require APPROOT . '/views/includes/user/navigation.php';
}
if ($_SESSION['account_type'] == 2) {
    require APPROOT . '/views/includes/bhw/navigation.php';
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-3">
        <nav class="mt-4">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link myrequest-tab active" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="false"><span style="font-size: 8pt;font-weight:bold;">Facilities</span></button>
                                <button class="nav-link myrequest-tab " id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="false"><span style="font-size: 8pt;font-weight:bold;">Pending</span></button>
                                <button class="nav-link myrequest-tab" id="nav-approved-tab" data-bs-toggle="tab" data-bs-target="#nav-approved" type="button" role="tab" aria-controls="nav-approved" aria-selected="false"><span style="font-size: 8pt; font-weight:bold;">Approved</span></button>
                                <button class="nav-link myrequest-tab" id="nav-disapproved-tab" data-bs-toggle="tab" data-bs-target="#nav-disapproved" type="button" role="tab" aria-controls="nav-disapproved" aria-selected="false"><span style="font-size: 8pt; font-weight:bold;">Rejected</span></button>
                                <button class="nav-link myrequest-tab" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed" aria-selected="false"><span style="font-size: 8pt; font-weight:bold;">Completed</span></button>
                                <button class="nav-link myrequest-tab" id="nav-cancelled-tab" data-bs-toggle="tab" data-bs-target="#nav-cancelled" type="button" role="tab" aria-controls="nav-cancelled" aria-selected="false"><span style="font-size: 8pt; font-weight:bold;">Cancelled</span></button>
                            </div>
                        </nav>

            <div class="tab-pane fade show active pt-2" id="nav-available" role="tabpanel" aria-labelledby="nav-facilities-tab">
                <div class="container">
                    <div class="row g-4">
                        <?php if (!$data['facilities']) {
                            echo "<h6 class='ps-3 d-flex justify-content-center'>No available facilities.</h6>";
                        } ?>
                        <?php foreach ($data['facilities'] as $facility) : ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card border-light rounded-lg shadow-sm h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-center text-dark"><?php echo $facility->Name; ?></h5>
                                        <p class="card-text text-muted text-center" >
                                            <strong>Location:</strong> <?php echo $facility->Location; ?><br>
                                            <strong>Rate/Hr:</strong> <?php echo $facility->Capacity; ?>
                                        </p>
                                        <button type="button" class="btn btn-primary mt-auto w-100" data-bs-toggle="modal" data-bs-target="#rentModal<?php echo $facility->id; ?>">
                                            Rent
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal for Rent -->
                            <div class="modal fade" id="rentModal<?php echo $facility->id; ?>" tabindex="-1" aria-labelledby="rentModalLabel<?php echo $facility->id; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rentModalLabel<?php echo $facility->Name; ?>">Rent Facility - <?php echo $facility->Name; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?php echo URLROOT . '/users/bookFacility/' . $facility->Name; ?>" method="POST">

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="contact" class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" name="contact" id="contact" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address" id="address" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="datetime" class="form-label">Date and Time</label>
                                                    <input type="datetime-local" class="form-control" name="datetime" id="datetime" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="hours" class="form-label">Hours</label>
                                                    <input type="text" class="form-control" name="hours" id="hours" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="purpose" class="form-label">Purpose</label>
                                                    <textarea class="form-control" name="purpose" id="purpose" rows="3" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        <?php endforeach; ?>
                    </div>
                </div>
                   
            </div>
            
            <!-- Additional CSS -->
            <style>
                .card {
                    background-color: #f8f9fa;
                    border-radius: 10px;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
                }

                .btn-primary {
                    background-color: #007bff;
                    border-color: #007bff;
                }

                .btn-primary:hover {
                    background-color: #0056b3;
                }
            </style>
        </div>
    </main>
    <?php require APPROOT . '/views/includes/footer.php'; ?> 
</div>


