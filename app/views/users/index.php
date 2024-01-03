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

<!-- <div class="loader-bg">
    <div class="loader"></div>
</div> -->
<div id="layoutSidenav_content">
                <main>




                    <div class="container-fluid px-4">

                        <div class="row gx-5">
                            <div class="col-12 offset-md-2 col-md-6">
                                <div class="col-12  col-md-12">
                                    <div class="row mt-4">
                                        <div class="card ">
                                            <div class="card-body row">
                                                <h5 class="card-title">Certification Request</h5>

                                                <div class="col-6 col-md-6">
                                                    <p class="card-text">To request for a Certificate, Click Request button.</p>
                                                </div>
                                                <div class="col-6 col-md-6 text-end  m-auto">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalRequest" class="btn btn-primary  ">Request</button>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12  col-md-12">
                                    <div class="row mt-3">
                                        <div class="card  ">
                                            <div class="card-body">
                                                <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">

                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                        <img src="<?php echo URLROOT . '/img/layout/1.png' ?>" class="d-block w-100" alt="...">
                                                        <div class="carousel-caption d-none  d-md-block">
                                                        </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                        <img src="<?php echo URLROOT . '/img/layout/2.png' ?>" class="d-block w-100" alt="...">
                                                        <div class="carousel-caption d-none  d-md-block">
                                                        </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                        <img src="<?php echo URLROOT . '/img/layout/3.png' ?>" class="d-block w-100" alt="...">
                                                        <div class="carousel-caption d-none  d-md-block">
                                                        </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                        <img src="<?php echo URLROOT . '/img/layout/4.png' ?>" class="d-block w-100" alt="...">
                                                        <div class="carousel-caption d-none  d-md-block">
                                                        </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                        <img src="<?php echo URLROOT . '/img/layout/5.png' ?>" class="d-block w-100" alt="...">
                                                        <div class="carousel-caption d-none  d-md-block">
                                                        </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                        <img src="<?php echo URLROOT . '/img/layout/6.png' ?>" class="d-block w-100" alt="...">
                                                        <div class="carousel-caption d-none  d-md-block">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12  col-md-12">
                                    <div class="row mt-3">
                                        <div class="card ">
                                            <div class="card-header">
                                                <h5><center>BARANGAY OFFICIALS</center></h5>
                                            </div>
                                            <div class="card-body">
                                            <img src="<?php echo URLROOT . '/img/layout/' . $data['content']->photo ?>" class="img-fluid" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-md-1 col-md-3 d-none  d-md-block mt-4">
                                <div class="col-12 col-md-12  ">
                                    <!-- <nav class="mt-4">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link myrequest-tab active" id="nav-approved-tab" data-bs-toggle="tab" data-bs-target="#nav-approved" type="button" role="tab" aria-controls="nav-approved" aria-selected="true"><span style="font-size: 8pt; font-weight:bold;">Ready to claim request</span></button>
                                        </div>
                                    </nav> -->

                                    <!-- <div class="tab-content" id="nav-tabContent"> -->

                                        <!-- APPROVED -->
                                        <!-- <div class="tab-pane fade show active pt-2" id="nav-approved" role="tabpanel" aria-labelledby="nav-approved-tab"> -->
                                            <div class="row">
                                                <?php foreach ($data['approve'] as $certificate):?>
                                                        <div class="card  col-12 col-md-12">
                                                            <div class="card-body row">
                                                                <div class="col-12">
                                                                    <p class="card-text">
                                                                       <span class="fw-bold"><?php echo $certificate->form_type ?></span><br>
                                                                        Status: <span class="text-primary fw-bold"><?php echo $certificate->req_status ?></span><br>
                                                                        <span class="text-success"><i>(bring valid id upon claiming)</i></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php endforeach?>
                                            </div>
                                        <!-- </div> -->
                                        <!-- DISAPPROVED -->
                                        <!-- <div class="tab-pane fade pt-2" id="nav-disapproved" role="tabpanel" aria-labelledby="nav-disapproved-tab"> -->
                                            <div class="row">
                                                <?php foreach ($data['disapprove'] as $certificate):?>
                                                            <div class="card  col-12 col-md-12">
                                                                <div class="card-body row">
                                                                    <div class="col-12">
                                                                        <p class="card-text">
                                                                            <span class="fw-bold"><?php echo $certificate->form_type ?></span><br>
                                                                            Status: <span class="text-danger fw-bold"><?php echo $certificate->req_status ?></span><br>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                <?php endforeach?>
                                            </div>
                                        <!-- </div> -->
                                     

                                    <!-- </div> -->

                                </div>
                                <div class="col-12  col-md-12 ">
                                    <div class="row mt-3">
                                        <div class="card ">
                                            <div class="card-body">
                                            <img src="<?php echo URLROOT . '/img/emr.png'?>" class="img-fluid" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>






                        </div>






                         




                    </div>




                    <!-- Modal for certificate of request -->
                    <?php
                        require APPROOT . '/views/users/modals/modal-request.php';
                    ?>
                    <!-- Modal for clearance selection -->
                    <?php
                        require APPROOT . '/views/users/modals/modal-clearance-type.php';
                    ?>



                </main>


<?php
    require APPROOT . '/views/includes/footer.php';
?>