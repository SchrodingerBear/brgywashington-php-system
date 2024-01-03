<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/admin/navigation.php';
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Certification</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Certification</li>
                        </ol>

                            <div class="card mb-4">
                                <div class="card-header">

                                    <div class="row g-1">

                                        <div class="col-4 col-md-5 ">
                                            <div class="input-group ">
                                                <!-- <span for="search" class="col-form-label-sm">First Name</span> -->
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                <input type="text" id="searchL" placeholder="Lastname" class="form-control form-control-sm searchName">
                                                <input type="text" id="searchF" placeholder="Firstname" class="form-control form-control-sm searchName">
                                                <input type="text" id="searchM" placeholder="Middlename" class="form-control form-control-sm searchName">
                                                <input type="text" id="searchS" placeholder="Suffix" class="form-control form-control-sm searchName">
                                                <div class=" text-success" style="position: absolute; top: -2rem; left:5rem"><h6 class=""  id="namePreview"></h6></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                        <select class="form-select form-select-sm" id="load" name="transac" aria-label="Default select example">
                                            <option value=""selected>--Select Transaction--</option>
                                            <option value="brgyIndigency">Barangay Indigency</option>
                                            <option value="brgyClearance">Barangay Clearance</option>
                                            <option value="brgyClearance-WITH ID">Barangay Clearance-with-ID</option>
                                            <option value="brgyPermit">Barangay Permit</option>
                                            <option value="brgyResidency">Barangay Residency</option>



                                        </select>
                                        </div>
                                        <div class="col-6 col-md-1">
                                            <button type="button" id="send" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"disabled>
                                                <i class="fas fa-arrow-down"></i> LOAD
                                            </button>
                                        </div>
                                        <div class="col-md-3 ">
                                            <form action="<?php echo URLROOT;?>/certificates/generate_walkin" method="POST" >
                                                <div class="row g-1 ">
                                                    <div class="col-md-3 text-end">
                                                        <label class="badge bg-info p-2">Year</label>
                                                    </div>
                                                    <div class="col-md-3 input-group-sm">
                                                        <input type="number" name="year" value="<?php echo date('Y') ?>"  class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-clipboard-list"></i>&nbsp;Generate List</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body ">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Purpose</th>
                                            <th>Qty</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Purpose</th>
                                            <th>Qty</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($data['certificates'] as $certificate):?>
                                        <tr>
                                            <td><?php echo $certificate->last_name . ',' . $certificate->first_name . ' ' .$certificate->middle_name. ' ' . $certificate->suffix; ?></td>
                                            <td><div class="badge rounded-pill bg-info"><?php echo $certificate->form_type;?></div></td> 
                                            <td><?php echo $certificate->purpose;?></td>
                                            <td><?php echo $certificate->qty;?></td>
                                            <td><?php echo date('Y/m/d h:i A', strtotime($certificate->date_created))?></td>
                                            <?php if($certificate->form_type == 'Barangay Indigency'): ?>
                                            <td><center><a class="btn btn-primary btn-sm rounded-pill" href="<?php echo URLROOT . "/certificates/generate_indigency/" . $certificate->id?>">Generate</a></center></td>
                                            <?php elseif($certificate->form_type == 'Barangay Permit'): ?>
                                            <td><center><a class="btn btn-primary btn-sm rounded-pill" href="<?php echo URLROOT . "/certificates/generate_permit/" . $certificate->id?>">Generate</a></center></td>
                                            <?php elseif($certificate->form_type == 'Barangay Residency'): ?>
                                            <td><center><a class="btn btn-primary btn-sm rounded-pill" href="<?php echo URLROOT . "/certificates/generate_residency/" . $certificate->id?>">Generate</a></center></td>
                                            <?php elseif($certificate->form_type == 'Barangay Clearance'): ?>
                                            <td><center><a class="btn btn-primary btn-sm rounded-pill" href="<?php echo URLROOT . "/certificates/generate_clearance/" . $certificate->id?>">Generate</a></center></td>
                                            <?php elseif($certificate->form_type == 'Barangay Clearance-ID'): ?>
                                            <td><center><a class="btn btn-primary btn-sm rounded-pill" href="<?php echo URLROOT . "/certificates/generate_clearance_id/" . $certificate->id?>">Generate</a></center></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>


                                        

                                </div>

                            </div>







                    </div>
                </main>
                
                <?php 

                ?>

                <!-- Modal for certificate of indigency -->
                <?php
                    require APPROOT . '/views/certificates/modals/modal-indigency.php';
                ?>

                <!-- Modal for certificate of barangay permit -->
                <?php
                    require APPROOT . '/views/certificates/modals/modal-permit.php';
                ?>    

                <!-- Modal for certificate of barangay residency -->
                <?php
                    require APPROOT . '/views/certificates/modals/modal-residency.php';
                ?>       
                <?php
                    require APPROOT . '/views/certificates/modals/modal-clearance.php';
                ?> 
                <?php
                    require APPROOT . '/views/certificates/modals/modal-clearance-id.php';
                ?>                           


                    <script>

                    </script>
<?php

    require APPROOT . '/views/includes/footer.php';
?>