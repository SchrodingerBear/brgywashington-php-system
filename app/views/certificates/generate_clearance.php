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
                                                            Barangay Clearance
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
                                                    <div class="d-flex flex-wrap justify-content-around">
                                                        <img src="<?php echo URLROOT .'/img/'. $data['detail']->pic_logo?>" class="img-fluid" id="brgy_logo-clearance">
                                                        <div class="text-center">
                                                            <img src="<?php echo URLROOT .'/img/'. $data['detail']->pic_logo?>"  class="img-fluid" width="125">
                                                        </div>
                                                        <div id="cert-head" class="text-center mt-5 ">
                                                            <h3 class="mb-0"></h3>
                                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                                            <h3 class="mb-0">PROVINCE OF <?php echo htmlspecialchars($province); ?></h3>
                                                            <h3 class="mb-0"><?php echo htmlspecialchars($municipality); ?></h3>
                                                            <h1 class="fw-bold mb-0">Barangay <?php echo htmlspecialchars($brgy_name); ?></i></h2>
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="<?php echo URLROOT .'/img/clav.png'?>?>" class="img-fluid" width="125">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div id="cert-body-clearance" class="col-md-12">
                                                            <div class="text-center mt-4">
                                                                <h1 id="office-brgy-clearance-h1"><u>OFFICE OF THE BARANGAY CAPTAIN</u></h1>
                                                            </div>
                                                            <div class="text-center mt-3">
                                                                <h1 id="brgy-cert-clearance-h1" class="mb-3">BARANGAY CLEARANCE</h1>
                                                            </div>
                                                            <div class="">
                                                                <?php if($data['certificate']->purpose == 'EMPLOYMENT'): ?>
                                                                <h2 class="row"><span id="purposeClearance" class="col-6 col-md-6">___/___ EMPLOYMENT</span><span id="purposeClearance" class="col-6 col-md-6">_______ BUSINESS</span></h2>
                                                                <h2 class="row"><span id="purposeClearance" class="col-6 col-md-6">_______ STUDENT</span><span id="purposeClearance" class="col-6 col-md-6">_______ OTHERS</span></h2>
                                                                <?php elseif($data['certificate']->purpose == 'BUSINESS'):?>
                                                                <h2 class="row"><span id="purposeClearance" class="col-6 col-md-6">_______ EMPLOYMENT</span><span id="purposeClearance" class="col-6 col-md-6">___/___ BUSINESS</span></h2>
                                                                <h2 class="row"><span id="purposeClearance" class="col-6 col-md-6">_______ STUDENT</span><span id="purposeClearance" class="col-6 col-md-6">_______ OTHERS</span></h2>
                                                                <?php elseif($data['certificate']->purpose == 'STUDENT'): ?>
                                                                <h2 class="row"><span id="purposeClearance" class="col-6 col-md-6">_______ EMPLOYMENT</span><span id="purposeClearance" class="col-6 col-md-6">_______ BUSINESS</span></h2>
                                                                <h2 class="row"><span id="purposeClearance" class="col-6 col-md-6">___/___ STUDENT</span><span id="purposeClearance" class="col-6 col-md-6">_______ OTHERS</span></h2>
                                                                <?php else: ?>
                                                                    <h2 class="row"><span id="purposeClearance" class="col-6 col-md-6">______ EMPLOYMENT</span><span id="purposeClearance" class="col-6 col-md-6">_______ BUSINESS</span></h2>
                                                                <h2 class="row"><span id="purposeClearance" class="col-6 col-md-6">_______ STUDENT</span><span id="purposeClearance" class="col-6 col-md-6"><u><?php echo strtoupper($data['certificate']->purpose); ?> </u> OTHERS</span></h2>
                                                                <?php endif; ?>
                                                            </div>
                                                            <h2 id="to-whom-h2" class="mt-3">TO WHOM IT MAY CONCERN:</h2>
                                                            <h2 class="mt-3">THIS IS TO CERTIFY that <span><?= strtoupper( $data['certificate']->first_name.' '.$data['certificate']->middle_name.' '.$data['certificate']->last_name) ?></span> 
                                                            , a resident of <?php echo $data['detail']->brgy_name ?>, <?php echo $data['detail']->address ?> whose signature and CTC No.  appear below </h2>
                                                            <h2 class="mt-3">This certification is issued upon the request of above-mentioned name for whatever local purpose it may serve.</h2>
                                                            <h2 class="mt-3">___ is known to possess a good moral character, law abiding and peace-loving citizen/resident.</h2>
                                                            <h2 class="mt-3">___ has never been prosecuted/convicted of any crime whatsoever as per record of this office.</h2>
                                                            <h2 class="mt-3">_/_ the above person who is applying permit
                                                                <?php if($data['certificate']->permit_to == 'NEW'): ?> 
                                                                (  /  )  new   (    ) renewal to operate   (   ) business  (   ) operate tricycle (    ) others, specify       : LOCAL PURPOSES complied with existing laws, regulations and local ordinances
                                                                <?php elseif($data['certificate']->permit_to == 'RENEWAL TO OPERATE'): ?> 
                                                                (    )  new   (  /  ) renewal to operate   (   ) business  (   ) operate tricycle (    ) others, specify 
                                                                <?php elseif($data['certificate']->permit_to == 'BUSINESS'): ?> 
                                                                (    )  new   (    ) renewal to operate   (  / ) business  (   ) operate tricycle (    ) others, specify 
                                                                <?php elseif($data['certificate']->permit_to == 'OPERATE TRICYCLE'): ?> 
                                                                (    )  new   (    ) renewal to operate   (   ) business  ( / ) operate tricycle (    ) others, specify 
                                                                <?php else: ?> 
                                                                (    )  new   (    ) renewal to operate   (   ) business  (   ) operate tricycle ( <?php echo strtoupper($data['certificate']->permit_to) ?>   ) others, specify 
                                                                <?php endif; ?>
                                                                promulgated by the national, provincial, municipal and barangay government.</h2>
                                                             <h2 class="mt-3">This certification is issued upon the request of <span><?='MR/MS.'. strtoupper($data['certificate']->last_name)?></span> for the above-cited purposes.</h2>
                                                             <h2 class="mt-3">Issued this <span><?= date('jS') ?></span> day of <span><?= date('F,  Y') ?></span> at <?php echo $data['detail']->brgy_name ?>, <?php echo $data['detail']->address ?>.</h2>
                                                             <div id="cert-foot-clearance" class="row mt-3 thumbmark mt-5">
                                                                 <div class="p-3 col-3 col-md-3"><h2 class="mt-3 fw-bold">_______________</h2><h2 class="ms-2 fw-bold">Signiture
                                                                     
                                                                 </h2></div>
                                                                 <div class="p-3 me-3 col-2 col-md-2 mark rounded-3 border border-3 border-dark"></div> 
                                                                 <div class="p-3 col-2 col-md-2 mark rounded-3 border border-3 border-dark"></div>
                                                                 <div class="p-3 text-end  col-5 col-md-5">
                                                                 <h1 class="mb-0 text-uppercase mt-3"><?php echo strtoupper($data['detail']->brgy_captain)?></h1>
                                                                 <p class="me-5 fw-bold">   Punong Barangay</p>
                                                            </div>
                                                            <div class="issued">
                                                                <h3>CTC No.________</h3>
                                                                <h3>Issued on: <?= date('jS') ?>  <?= date('F,  Y') ?></h3>
                                                                <h3>Issued at : <?php echo htmlspecialchars($brgy_name); ?>, <?php echo htmlspecialchars($municipality); ?>, <?php echo htmlspecialchars($province); ?></h3>

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