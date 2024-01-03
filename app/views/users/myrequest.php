<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    if($_SESSION['account_type'] == 0){
        require APPROOT . '/views/includes/user/navigation.php'; 
    }
    if($_SESSION['account_type'] == 2){
        require APPROOT . '/views/includes/bhw/navigation.php'; 
    }
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-3">

                        <nav class="mt-4">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link myrequest-tab active" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="true"><span style="font-size: 8pt;font-weight:bold;">Pending</span></button>
                                <button class="nav-link myrequest-tab" id="nav-approved-tab" data-bs-toggle="tab" data-bs-target="#nav-approved" type="button" role="tab" aria-controls="nav-approved" aria-selected="false"><span style="font-size: 8pt; font-weight:bold;">Approved</span></button>
                                <button class="nav-link myrequest-tab" id="nav-disapproved-tab" data-bs-toggle="tab" data-bs-target="#nav-disapproved" type="button" role="tab" aria-controls="nav-disapproved" aria-selected="false"><span style="font-size: 8pt; font-weight:bold;">Rejected</span></button>
                                <button class="nav-link myrequest-tab" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed" aria-selected="false"><span style="font-size: 8pt; font-weight:bold;">Completed</span></button>
                                <button class="nav-link myrequest-tab" id="nav-cancelled-tab" data-bs-toggle="tab" data-bs-target="#nav-cancelled" type="button" role="tab" aria-controls="nav-cancelled" aria-selected="false"><span style="font-size: 8pt; font-weight:bold;">Cancelled</span></button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <!-- PENDING -->
                            <div class="tab-pane fade show active pt-2" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                                <div class="row">
                                    <?php if(!$data['requests']){ echo "<h6 class='ps-3 d-flex justify-content-center'>Empty</h6>";} ?>
                                    <?php foreach ($data['requests'] as $certificate):?>
                                        <div class="card col-12 col-md-4">
                                            <div class="card-body row">
                                                <div class="col-9">
                                                    <h5 class="card-title"><?php echo $certificate->form_type ?></h5>
                                                    <p class="card-text">
                                                        Name: <?php echo $certificate->first_name . ' '. $certificate->middle_name . ' '. $certificate->last_name ?><br>
                                                        Date Request: <?php echo $certificate->date_created ?><br>
                                                        Status: <?php echo $certificate->req_status ?>
                                                    </p>
                                                </div>
                                                <div class="col-3 text-center m-auto ">
                                                <!-- BUTTON START HERE -->
                                                    <?php if($certificate->form_type == 'Barangay Indigency' AND $certificate->req_status != 'Approved'): ?>
                                                    <a class="btn btn-primary btn-sm mb-2 indigencybtn" id="indigencyBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalIndigency">Details</a>

                                                    <?php elseif($certificate->form_type == 'Barangay Permit' AND $certificate->req_status != 'Approved'): ?>
                                                    <a class="btn btn-primary btn-sm mb-2 permitbtn" id="permitBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalPermit">Details</a>

                                                    <?php elseif($certificate->form_type == 'Barangay Residency' AND $certificate->req_status != 'Approved'): ?>
                                                    <a class="btn btn-primary btn-sm mb-2 residencybtn" id="residencyBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalResidency">Details</a>

                                                    <?php elseif($certificate->form_type == 'Barangay Clearance' AND $certificate->req_status != 'Approved'): ?>
                                                    <a class="btn btn-primary btn-sm mb-2 clearancebtn" id="clearanceBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalClearance">Details</a>

                                                    <?php elseif($certificate->form_type == 'Barangay Clearance-ID' AND $certificate->req_status != 'Approved'): ?>
                                                    <a class="btn btn-primary btn-sm mb-2 clearanceIdbtn" id="clearanceIdBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalClearanceId">Details</a>

                                                    <?php endif; ?>
                                                <!-- BUTTON END HERE -->
                                                    <form action="<?php echo URLROOT?>/users/cancel_request" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $certificate->id ?>">
                                                        <button type="submit" onclick="validateForm()" class="btn btn-dark btn-sm">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach?>
                                </div>
                            </div>
                            <!-- APPROVED -->
                            <div class="tab-pane fade pt-2" id="nav-approved" role="tabpanel" aria-labelledby="nav-approved-tab">
                                <div class="row">
                                <?php if(!$data['approve']){ echo "<h6 class='ps-3 d-flex justify-content-center'>Empty</h6>";} ?>
                                    <?php foreach ($data['approve'] as $certificate):?>
                                            <div class="card col-12 col-md-4">
                                                <div class="card-body row">
                                                    <div class="col-12">
                                                        <h5 class="card-title"><?php echo $certificate->form_type ?></h5>
                                                        <p class="card-text">
                                                            Name: <?php echo $certificate->first_name . ' '. $certificate->middle_name . ' '. $certificate->last_name ?><br>
                                                            Date Request: <?php echo $certificate->date_created ?><br>
                                                            Status: <?php echo $certificate->req_status ?><br>
                                                            <span class="text-success"><i>(bring valid id upon claiming)</i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach?>
                                </div>
                            </div>
                            <!-- DISAPPROVED -->
                            <div class="tab-pane fade pt-2" id="nav-disapproved" role="tabpanel" aria-labelledby="nav-disapproved-tab">
                                <div class="row">
                                <?php if(!$data['disapprove']){ echo "<h6 class='ps-3 d-flex justify-content-center'>Empty</h6>";} ?>
                                    <?php foreach ($data['disapprove'] as $certificate):?>
                                                <div class="card col-12 col-md-4">
                                                    <div class="card-body row">
                                                        <div class="col-9">
                                                            <h5 class="card-title"><?php echo $certificate->form_type ?></h5>
                                                            <p class="card-text">
                                                                Name: <?php echo $certificate->first_name . ' '. $certificate->middle_name . ' '. $certificate->last_name ?><br>
                                                                Date Request: <?php echo $certificate->date_created ?><br>
                                                                Status: <?php echo $certificate->req_status ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-3 text-center m-auto ">
                                                        <!-- BUTTON START HERE -->
                                                            <?php if($certificate->form_type == 'Barangay Indigency' AND $certificate->req_status != 'Approved'): ?>
                                                            <a class="btn btn-primary btn-sm mb-2 indigencybtn" id="indigencyBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalIndigency">Details</a>

                                                            <?php elseif($certificate->form_type == 'Barangay Permit' AND $certificate->req_status != 'Approved'): ?>
                                                            <a class="btn btn-primary btn-sm mb-2 permitbtn" id="permitBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalPermit">Details</a>

                                                            <?php elseif($certificate->form_type == 'Barangay Residency' AND $certificate->req_status != 'Approved'): ?>
                                                            <a class="btn btn-primary btn-sm mb-2 residencybtn" id="residencyBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalResidency">Details</a>

                                                            <?php elseif($certificate->form_type == 'Barangay Clearance' AND $certificate->req_status != 'Approved'): ?>
                                                            <a class="btn btn-primary btn-sm mb-2 clearancebtn" id="clearanceBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalClearance">Details</a>

                                                            <?php elseif($certificate->form_type == 'Barangay Clearance-ID' AND $certificate->req_status != 'Approved'): ?>
                                                            <a class="btn btn-primary btn-sm mb-2 clearanceIdbtn" id="clearanceIdBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalClearanceId">Details</a>

                                                            <?php endif; ?>
                                                        <!-- BUTTON END HERE -->
                                                            <!-- <button class="btn btn-dark btn-sm">Cancel</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php endforeach?>
                                </div>
                            </div>
                            <!-- COMPLETED -->
                            <div class="tab-pane fade pt-2" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
                                <div class="row">
                                <?php if(!$data['complete']){ echo "<h6 class='ps-3 d-flex justify-content-center'>Empty</h6>";} ?>
                                    <?php foreach ($data['complete'] as $certificate):?>
                                                <div class="card col-12 col-md-4">
                                                    <div class="card-body row">
                                                        <div class="col-12">
                                                            <h5 class="card-title"><?php echo $certificate->form_type ?></h5>
                                                            <p class="card-text">
                                                                Name: <?php echo $certificate->first_name . ' '. $certificate->middle_name . ' '. $certificate->last_name ?><br>
                                                                Date Request: <?php echo $certificate->date_created ?><br>
                                                                Status: <?php echo $certificate->req_status ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php endforeach?>
                                </div>
                            </div>

                            <!-- CANCELLED -->
                            <div class="tab-pane fade pt-2" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
                                <div class="row">
                                <?php if(!$data['cancel']){ echo "<h6 class='ps-3 d-flex justify-content-center'>Empty</h6>";} ?>
                                    <?php foreach ($data['cancel'] as $certificate):?>
                                                <div class="card col-12 col-md-4">
                                                    <div class="card-body row">
                                                        <div class="col-12">
                                                            <h5 class="card-title"><?php echo $certificate->form_type ?></h5>
                                                            <p class="card-text">
                                                                Name: <?php echo $certificate->first_name . ' '. $certificate->middle_name . ' '. $certificate->last_name ?><br>
                                                                Date Request: <?php echo $certificate->date_created ?><br>
                                                                Status: <?php echo $certificate->req_status ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php endforeach?>
                                </div>
                            </div>

                        </div>



                        <!-- Modal for certificate of indigency -->
                        <?php
                            require APPROOT . '/views/users/modals/modal-detail-indigency.php';
                        ?>

                        <!-- Modal for certificate of barangay permit -->
                        <?php
                            require APPROOT . '/views/users/modals/modal-detail-permit.php';
                        ?>    

                        <!-- Modal for certificate of barangay residency -->
                        <?php
                            require APPROOT . '/views/users/modals/modal-detail-residency.php';
                        ?>       
                        <!-- Modal for certificate of barangay clearance -->
                        <?php
                            require APPROOT . '/views/users/modals/modal-detail-clearance.php';
                        ?> 
                        <!-- Modal for certificate of barangay clearance id -->
                        <?php
                            require APPROOT . '/views/users/modals/modal-detail-clearance-id.php';
                        ?>  

                    </div>
                </main>


<?php
    require APPROOT . '/views/includes/footer.php';
?>