<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/admin/navigation.php';
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                            <h3 class="mt-4">Generate Certificate</h3>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Generate Certificate</li>
                                </ol>
                                <div class="page-inner">
                                    <div class="row mt--2">
                                        <div class="col-md-12">

                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-6 col-md-10">
                                                            Barangay Residency
                                                        </div>
                                                        <div class="col-6 col-md-2  d-grid gap-2">
                                                            <button class="btn btn-primary btn-sm" onclick="printDiv('printThis')">
                                                            <i class="fa fa-print"></i>
                                                            Print Certificate
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body m-5" id="printThis">
                                                <img src="<?php echo URLROOT .'/img/'. $data['detail']->pic_logo?>" class="img-fluid" id="brgy_logo">
                                                    <div class="d-flex flex-wrap justify-content-around ">
                                                        <div class="text-center">
                                                            <img src="<?php echo URLROOT .'/img/'. $data['detail']->pic_logo?>" class="img-fluid" width="125">
                                                        </div>
                                                        <div id="cert-head" class="text-center mt-5">
                                                            <h3 class="mb-0"></h3>
                                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                                            <h3 class="mb-0">PROVINCE OF <?php echo htmlspecialchars($province); ?></h3>
                                                            <h3 class="mb-0"><?php echo htmlspecialchars($municipality); ?></h3>
                                                            <h1 class="fw-bold mb-0"><?php echo $data['detail']->brgy_name ?></i></h2>
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="<?php echo URLROOT .'/img/Surigao_City_Seal.png'?>" class="img-fluid" width="125">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div id="cert-body" class="col-md-12">
                                                            <div class="text-center mt-4">
                                                                <h1 id="office-brgy-h1"><u>OFFICE OF THE BARANGAY CAPTAIN</u></h1>
                                                            </div>
                                                            <div class="text-center mt-4">
                                                                <h1 id="brgy-cert-h1" class="mb-5">BARANGAY CERTIFICATION</h1>
                                                            </div>
                                                            <h2 id="to-whom-h2" class="mt-5">TO WHOM IT MAY CONCERN:</h2>
                                                            <h2 class="mt-3">THIS IS TO CERTIFY that <span><?= strtoupper( $data['certificate']->first_name.' '.$data['certificate']->middle_name.' '.$data['certificate']->last_name) ?></span> 
                                                            the <?php if($data['certificate']->gender == 'MALE') { echo'son';}else{ echo 'daughter';} ?> of <span><?= strtoupper( $data['certificate']->father_firstname.' '.$data['certificate']->father_middlename.' '.$data['certificate']->father_lastname) .' and '.strtoupper( $data['certificate']->mother_firstname.' '.$data['certificate']->mother_middlename.' '.$data['certificate']->mother_maidenname) ?></span>
                                                            who was born on <span><?php $birthDate = new DateTime($data['certificate']->birth_date); echo date_format( $birthDate,'F j, Y') ?></span> at <?= $data['certificate']->birth_place ?>.</h2>
                                                            <h2 class="mt-3">This certification is issued upon the request of <span><?='MR.'. strtoupper($data['certificate']->father_lastname) .' and MS.'.strtoupper($data['certificate']->mother_maidenname) ?></span> for late registration purposes.</h2>
                                                            <h2 class="mt-3">Done this <span><?= date('jS') ?></span> day of <span><?= date('F,  Y') ?></span> at <?php echo $data['detail']->brgy_name ?>, <?php echo htmlspecialchars($municipality); ?>, <?php echo htmlspecialchars($province); ?></h2>
                                                        </div>
                                                        <div id="cert-foot" class="col-md-12">
                                                            <div class="p-0 text-end me-5">
                                                                <h1 class="mb-0 text-uppercase"><?php echo strtoupper($data['detail']->brgy_captain)?></h1>
                                                                <p class="me-5">Punong Barangay</p>
                                                            </div>
                                                            <div class="p-0 text-start me-5">
                                                                <h2 class="mb-0 text-uppercase">NOT VALID WITHOUT SEAL</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                            



                    </div>
                </main>


<?php
    require APPROOT . '/views/includes/footer.php';
?>