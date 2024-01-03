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


                        <div class="card  col-12 offset-md-2 mt-3 col-md-8">
                            <div class="card-header">
                                <div class="col-2"><a href="javascript:history.go(-1)"><i class="fas fa-arrow-left"></i></a></div>
                            </div>
                            <img src="<?php if($data['myDetails']->profile_pic){ echo URLROOT. '/img/'. $data['myDetails']->profile_pic;} else{ echo URLROOT. '/img/id/resident/placeholder.png';}  ?>" style="width: 160px;" class="card-img-top m-auto rounded-circle border border-primary mt-3" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title text-center"><?php echo $data['myDetails']->first_name . ' '. $data['myDetails']->middle_name . ' ' . $data['myDetails']->last_name . ' ' . $data['myDetails']->suffix ?></h5>
                                <!-- <p class="card-text text-center">Baka renejay to!</p> -->
                                <div class="row">
                                    <div class="col-12  offset-md-4 col-md-4 text-center">

                                    <?php if($data['myDetails']->status == '') {?>
                                        <button class="btn btn-outline-warning  btn-sm rounded-pill verifyRequest"  type="button" data-bs-toggle="modal" data-bs-target="#modalVerify">Verify&nbsp;<i class="fas fa-info-circle"></i></button>
                                    <?php }else if($data['myDetails']->status == 'Verified'){?>
                                        <button class="btn btn-primary btn-sm  rounded-pill verifyRequest"  type="button">Verified&nbsp;<i class="fas fa-check"></i></button>
                                    <?php }else if($data['myDetails']->status == 'not verified'){ ?>
                                        <button class="btn btn-danger rounded-pill  btn-sm verifyRequest"  type="button" data-bs-toggle="modal" data-bs-target="#modalVerify">Rejected&nbsp;<i class="fas fa-times"></i></button>
                                    <?php }else if($data['myDetails']->status == 'To verify'){ ?>
                                        <button class="btn btn-secondary rounded-pill  btn-sm verifyRequest"  type="button">Verifying...&nbsp;<i class="fas fa-spinner"></i></button>
                                    <?php } ?>
                                        <div class="d-grid gap-2 mt-3">
                                            <button class="btn btn-primary  editProfile"  type="button" data-bs-toggle="modal" data-bs-target="#modalProfile">Edit details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item "><i class="fas fa-user"></i>&nbsp;<span class="fw-bold">Username:</span> <?php echo $data['myDetails']->username?></li>
                                <!-- <li class="list-group-item"><i class="fas fa-envelope"></i>&nbsp;<span class="fw-bold">Email:</span> <?php  $data['myDetails']->email?></li> -->
                                <!-- <li class="list-group-item"><i class="fas fa-mobile-alt"></i>&nbsp;<span class="fw-bold">Mobile:</span> <?php echo $data['myDetails']->mobile_number?></li> -->
                                <!-- <li class="list-group-item"><i class="fas fa-map-marker-alt"></i>&nbsp;<span class="fw-bold">Address:</span> <?php echo $data['myDetails']->address ?></li> -->
                                <!-- <li class="list-group-item"><i class="fas fa-map-pin"></i>&nbsp;<span class="fw-bold">Purok :</span> <?php echo $data['myDetails']->purok_number ?></li> -->
                                <!-- <li class="list-group-item"><i class="fas fa-venus-mars"></i>&nbsp;<span class="fw-bold">Gender:</span> <?php echo $data['myDetails']->gender?></li> -->
                            </ul>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </main>








                <?php
                    require APPROOT . '/views/users/modals/modal-edit-profile.php';
                ?>
                <?php
                    require APPROOT . '/views/users/modals/modal-verify-account.php';
                ?>



<?php
    require APPROOT . '/views/includes/footer.php';
?>