<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/admin/navigation.php';
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Document Request</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Document Request</li>
                        </ol>
                                <div class="card mb-4">
                                    <div class="card-body ">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="true">Request</button>
                                            <button class="nav-link" id="nav-approve-tab" data-bs-toggle="tab" data-bs-target="#nav-approve" type="button" role="tab" aria-controls="nav-approve" aria-selected="false">Approved</button>
                                            <button class="nav-link" id="nav-disapprove-tab" data-bs-toggle="tab" data-bs-target="#nav-disapprove" type="button" role="tab" aria-controls="nav-disapprove" aria-selected="false">Disapproved</button>
                                            <button class="nav-link" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-complete" type="button" role="tab" aria-controls="nav-complete" aria-selected="false">Completed</button>
                                            <div class="offset-3 offset-md-3">
                                                <form action="<?php echo URLROOT;?>/certificates/generate_request" method="POST" >
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
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                    <!-- REQUEST -->
                                    <div class="tab-pane fade show active pt-2" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">
                                        <!-- START HERE -->
                                        <table  id="datatablesSimple1">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                    <th>Date</th>
                                                    <th>Qty</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                    <th>Date</th>
                                                    <th>Qty</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php foreach ($data['requests'] as $certificate):?>
                                                <tr>
                                                    <td><?php echo $certificate->last_name . ',' . $certificate->first_name . ' ' .$certificate->middle_name. ' ' . $certificate->suffix; ?></td>
                                                    <td><div class="badge rounded-pill bg-info"><?php echo $certificate->form_type;?></div></td> 
                                                    <td><?php echo $certificate->purpose;?></td>
                                                    <td><?php echo date('Y/m/d h:i A', strtotime($certificate->date_created))?></td>
                                                    <td><?php echo $certificate->qty;?></td>
                                                    <?php if($certificate->form_type == 'Barangay Indigency' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn btn-primary btn-sm rounded-pill indigencybtn" id="indigencyBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalIndigency">View</a></div></td>

                                                    <?php elseif($certificate->form_type == 'Barangay Permit' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn btn-primary btn-sm rounded-pill permitbtn" id="permitBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalPermit">View</a></div></td>

                                                    <?php elseif($certificate->form_type == 'Barangay Residency' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn btn-primary btn-sm rounded-pill residencybtn" id="residencyBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalResidency">View</a></div></td>

                                                    <?php elseif($certificate->form_type == 'Barangay Clearance' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn btn-primary btn-sm rounded-pill clearancebtn" id="clearanceBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalClearance">View</a></div></td>

                                                    <?php elseif($certificate->form_type == 'Barangay Clearance-ID' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn btn-primary btn-sm rounded-pill clearanceIdbtn" id="clearanceIdBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalClearanceId">View</a></div></td>

                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!-- END HERE -->
                                    </div>
                                    <!-- APPROVE -->
                                    <div class="tab-pane fade pt-2" id="nav-approve" role="tabpanel" aria-labelledby="nav-approve-tab">
                                        <!-- START HERE -->
                                        <table  id="datatablesSimple2">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                    <th>Date</th>
                                                    <th>Qty</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                    <th>Date</th>
                                                    <th>Qty</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php foreach ($data['approve'] as $certificate):?>
                                                <tr>
                                                    <td><?php echo $certificate->last_name . ',' . $certificate->first_name . ' ' .$certificate->middle_name. ' ' . $certificate->suffix; ?></td>
                                                    <td><div class="badge rounded-pill bg-info"><?php echo $certificate->form_type;?></div></td> 
                                                    <td><?php echo $certificate->purpose;?></td>
                                                    <td><?php echo date('Y/m/d h:i A', strtotime($certificate->date_created))?></td>
                                                    <td><?php echo $certificate->qty;?></td>
                                                    <?php if($certificate->form_type == 'Barangay Indigency' AND $certificate->req_status == 'Approved'): ?>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm rounded-pill  " href="<?php echo URLROOT . "/certificates/generate_indigency/" . $certificate->id?>/req"><span style=";">Generate</span></a>
                                                        <a class="btn btn-dark btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/done/" . $certificate->id?>/req"><span style=";">Complete</span></a>
                                                    </td>

                                                    <?php elseif($certificate->form_type == 'Barangay Permit' AND $certificate->req_status == 'Approved'): ?>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/generate_permit/" . $certificate->id?>/req"><span style=";">Generate</span></a>
                                                        <a class="btn btn-dark btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/done/" . $certificate->id?>/req"><span style=";">Complete</span></a>
                                                    </td>

                                                    <?php elseif($certificate->form_type == 'Barangay Residency' AND $certificate->req_status == 'Approved'): ?>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/generate_residency/" . $certificate->id?>/req"><span style=";">Generate</span></a>
                                                        <a class="btn btn-dark btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/done/" . $certificate->id?>/req"><span style=";">Complete</span></a>
                                                    </td>

                                                    <?php elseif($certificate->form_type == 'Barangay Clearance' AND $certificate->req_status == 'Approved'): ?>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/generate_clearance/" . $certificate->id?>/req">Generate</a>
                                                        <a class="btn btn-dark btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/done/" . $certificate->id?>/req">Complete</a>
                                                    </td>

                                                    <?php elseif($certificate->form_type == 'Barangay Clearance-ID' AND $certificate->req_status == 'Approved'): ?>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/generate_clearance_id/" . $certificate->id?>/req"><span style=";">Generate</span></a>
                                                        <a class="btn btn-dark btn-sm rounded-pill " href="<?php echo URLROOT . "/certificates/done/" . $certificate->id?>/req"><span style=";">Complete</span></a>
                                                    </td>

                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!-- END HERE -->
                                    </div>
                                    <!-- DISAPPROVE -->
                                    <div class="tab-pane fade pt-2" id="nav-disapprove" role="tabpanel" aria-labelledby="nav-disapprove-tab">
                                        <!-- START HERE -->
                                        <table  id="datatablesSimple3">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                    <th>Date</th>
                                                    <th>Qty</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                    <th>Date</th>
                                                    <th>Qty</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php foreach ($data['disapprove'] as $certificate):?>
                                                <tr>
                                                    <td><?php echo $certificate->last_name . ',' . $certificate->first_name . ' ' .$certificate->middle_name. ' ' . $certificate->suffix; ?></td>
                                                    <td><div class="badge rounded-pill bg-info"><?php echo $certificate->form_type;?></div></td> 
                                                    <td><?php echo $certificate->purpose;?></td>
                                                    <td><?php echo date('Y/m/d h:i A', strtotime($certificate->date_created))?></td>
                                                    <td><?php echo $certificate->qty;?></td>
                                                    <?php if($certificate->form_type == 'Barangay Indigency' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn btn-primary btn-sm indigencybtn" id="indigencyBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalIndigency">View</a></div></td>

                                                    <?php elseif($certificate->form_type == 'Barangay Permit' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn rounded-pill btn-primary btn-sm permitbtn" id="permitBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalPermit">View</a></div></td>

                                                    <?php elseif($certificate->form_type == 'Barangay Residency' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn rounded-pill btn-primary btn-sm residencybtn" id="residencyBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalResidency">View</a></div></td>

                                                    <?php elseif($certificate->form_type == 'Barangay Clearance' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn rounded-pill btn-primary btn-sm clearancebtn" id="clearanceBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalClearance">View</a></div></td>

                                                    <?php elseif($certificate->form_type == 'Barangay Clearance-ID' AND $certificate->req_status != 'Approved'): ?>
                                                    <td><div class="d-grid gap-2"><a class="btn rounded-pill btn-primary btn-sm clearanceIdbtn" id="clearanceIdBtn" type="button" data-bs-toggle="modal" data-id="<?php echo $certificate->id?>" data-bs-target="#modalClearanceId">View</a></div></td>

                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!-- END HERE -->
                                    </div>
                                    <!-- Completed -->
                                    <div class="tab-pane fade pt-2" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab">
                                        <!-- START HERE -->
                                        <table  id="datatablesSimple4">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                    <th>Date</th>
                                                    <th>Qty</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Purpose</th>
                                                    <th>Date</th>
                                                    <th>Qty</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php foreach ($data['complete'] as $certificate):?>
                                                <tr>
                                                    <td><?php echo $certificate->last_name . ',' . $certificate->first_name . ' ' .$certificate->middle_name. ' ' . $certificate->suffix; ?></td>
                                                    <td><div class="badge rounded-pill bg-info"><?php echo $certificate->form_type;?></div></td> 
                                                    <td><?php echo $certificate->purpose;?></td>
                                                    <td><?php echo date('Y/m/d h:i A', strtotime($certificate->date_created))?></td>
                                                    <td><?php echo $certificate->qty;?></td>
                                                    <td><?php echo $certificate->req_status; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!-- END HERE -->
                                    </div>
                                </div>


                            </div>


                        </div>







                        <!-- Modal for certificate of indigency -->
                        <?php
                            require APPROOT . '/views/certificates/modals/modal-view-indigency.php';
                        ?>

                        <!-- Modal for certificate of permit -->
                        <?php
                            require APPROOT . '/views/certificates/modals/modal-view-permit.php';
                        ?>

                        <!-- Modal for certificate of residency -->
                        <?php
                            require APPROOT . '/views/certificates/modals/modal-view-residency.php';
                        ?>

                        <!-- Modal for certificate of clearance -->
                        <?php
                            require APPROOT . '/views/certificates/modals/modal-view-clearance.php';
                        ?>

                        <!-- Modal for certificate of clearanceId -->
                        <?php
                            require APPROOT . '/views/certificates/modals/modal-view-clearance-id.php';
                        ?>




                    </div>
                </main>
                
                <?php 

                ?>                        

<?php

    require APPROOT . '/views/includes/footer.php';
?>