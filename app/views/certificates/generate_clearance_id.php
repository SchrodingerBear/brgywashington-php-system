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
                                                            <h3 class="mb-0">c</h3>
                                                            <h1 class="fw-bold mb-0">Barangay <?php echo htmlspecialchars($brgy_name); ?></i></h2>
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="<?php echo URLROOT .'/img/Surigao_City_Seal.png'?>?>" class="img-fluid" width="125">
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
                                                            <h2 class="mt-3">___= is known to possess a good moral character, law abiding and peace-loving citizen/resident.</h2>
                                                            <h2 class="mt-3">___= has never been prosecuted/convicted of any crime whatsoever as per record of this office.</h2>
                                                            <h2 class="mt-3">_/_= the above person who is applying permit
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
                                                                 <div class="p-3 col-3 col-md-3"><h2 class="mt-3 fw-bold">_______________</h2><h2 class="ms-2 fw-bold">Signature
                                                                     
                                                                 </h2></div>
                                                                 <div class="p-3 me-3 col-2 col-md-2 mark rounded-3 border border-3 border-dark"></div> 
                                                                 <div class="p-3 col-2 col-md-2 mark rounded-3 border border-3 border-dark"></div>
                                                                 <div class="p-3 text-end  col-5 col-md-5">
                                                                 <h1 class="mb-0 text-uppercase mt-3"><?php echo strtoupper($data['detail']->brgy_captain)?></h1>
                                                                 <p class="me-5 fw-bold">Punong Barangay</p>
                                                            </div>
                                                            <div class="issued">
                                                                <h3>CTC No.________</h3>
                                                                <h3>Issued on: ________________</h3>
                                                                <h3>Issued at : Barangay Washington, <?php echo strtoupper($data['detail']->address) ?></h3>

                                                            </div>

                                                            <div class="with-id row text-center mt-5 ms-auto">
                                                                <div class="col-6 col-md-6 id">
                                                                    <div class=" d-flex flex-wrap justify-content-around">
                                                                        <img src="<?php echo URLROOT .'/img/'. $data['detail']->pic_logo?>" class="img-fluid" id="brgy_logo-id">
                                                                        <div class="text-center">
                                                                        <img src="<?php echo URLROOT .'/img/'. $data['detail']->pic_logo?>"  class="img-fluid mt-2" width="60">
                                                                        </div>
                                                                        <div id="cert-head" class="text-center mt-2">
                                                                            <h3 class="mb-0"></h3>
                                                                            <h3 class="mb-0 fw-bold">Republic of the Philippines</h3>
                                                                            <h3 class="mb-0 fw-bold">PROVINCE OF Surigao del norte</h3>
                                                                            <h3 class="mb-0 fw-bold">Surigao City</h3>
                                                                            <h1 class="fw-bold mb-0"><?php echo $data['detail']->brgy_name?></i></h2>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <img src="<?php echo URLROOT .'/img/Surigao_City_Seal.png'?>?>" class="img-fluid mt-2" width="60px">
                                                                        </div>
                                                                    </div>
  

                                                                        <div id="cert-body-id" class="ms-0" >

                                                                            <div class="row ">
                                                                            <div class="col-12 col-md-12 col-xl-12 mt-3" style="margin-left:10px; padding-left:0px;">
                                                                                <h4><span id="brgy-h4-span" class="me-3" >BARANGAY CLEARANCE</span> <span class="ms-5 me-0" style="font-size: 9pt; "><u>I.D NO.<?php echo $data['certificate']->id_no ?></u></span></h4>
                                                                            </div>
                                                                                <div class="col-8 col-md-8 col-xl-8 mt-1 " id="id-info" style="width:209px">
                                                                                <h4><u>NAME:<?php echo strtoupper($data['certificate']->first_name . ' '.$data['certificate']->last_name .' '. $data['certificate']->suffix) ?> </u></h4>
                                                                                <h4><u>ADDRESS: Barangay Washington, Surigao City</u></h4>
                                                                                <h4><u>DATE OF BIRTH:<?php  $birthDate = new DateTime($data['certificate']->birth_date); echo date_format( $birthDate,'F j, Y') ?></u></h4>
                                                                                <h4><u>BIRTH PLACE:<?php echo strtoupper($data['certificate']->birth_place) ?></u></h4>
                                                                                <h4><u>SEX/CIVIL STATUS:<?php echo  substr($data['certificate']->gender, 0, 1).'/'.strtoupper($data['certificate']->civil_status)?></u></h4>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 col-xl-4 mt-1" id="id-1x1">
                                                                                    <img src="<?php echo URLROOT . '/img/id/' . $data['certificate']->id_pic ?>"  class="" width="92px" height="92px" alt="">

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                </div>

                                                                <div class="col-6 ms-2 col-md-6 id">
                                                                    <div class=" d-flex flex-wrap justify-content-around">
                                                                        <img src="<?php echo URLROOT .'/img/'. $data['detail']->pic_logo?>" class="img-fluid" id="brgy_logo-id">

                                                                    </div>
                                                                        <div id="cert-body-id" class=" mt-5 ">
                                                                            <div class="col-12 col-md-12  back-id  " >
                                                                                <h4 ><span class="fw-bold  px-auto mx-auto">____________________________________</span></h4>
                                                                                <h4 ><span class="mx-auto" >SIGNATURE</span></h4>
                                                                                <h4 class="mt-3"><span class="fw-bold mx-auto " style="text-decoration: underline;"><?php echo strtoupper($data['detail']->brgy_captain)?></span> </h4>
                                                                                <h4> <span class="mx-auto mt-" >BARANGAY CAPTAIN</span></h4>
                                                                                <h4 style="margin-top:30px;"><span class="ms-1" style="font-size:9pt;">DATE ISSUED:<?php echo date('n/j/Y') ?> 1 YEAR FROM DATE ISSUE</span></h4>
                                                                            </div>
                                                                        </div>

                                                                </div>


                                                            
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