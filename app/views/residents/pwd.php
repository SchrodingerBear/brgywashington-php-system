<?php
    require APPROOT . '/views/includes/head.php';
?>


<?php
    if($_SESSION['account_type'] == 1){
        require APPROOT . '/views/includes/admin/navigation.php'; 
    }
    if($_SESSION['account_type'] == 2){
        require APPROOT . '/views/includes/bhw/navigation.php'; 
    }
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Person with Disablility</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Person with Disablility</li>
                        </ol>

                            <div class="card mb-4">
                                <div class="card-header">

                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                        <i class="fas fa-users"></i>
                                        Person with Disablility Section 
                                        </div>

                                        <div class="">
                                            <a type="button" href="<?php echo URLROOT. '/residents/generate_pwd' ?>" id="addResidentBtn" class="btn btn-primary btn-sm">
                                            <i class="fas fa-clipboard-list"></i>&nbsp;Generate List
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body ">


                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Civil Status</th>
                                                <th>Purok</th>
                                                <th>Contact No.</th>
                                                <th>Date Registered</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Civil Status</th>
                                                <th>Purok</th>
                                                <th>Contact No.</th>
                                                <th>Date Registered</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($data['pwd'] as $resident):?>
                                            <tr>
                                                <td><?php echo $resident->last_name . ',' . $resident->first_name . ' ' .$resident->middle_name. ' ' . $resident->suffix; ?></td>
                                                <td><?php echo $resident->gender;?></td>
                                                <td><?php echo $resident->civil_status;?></td>
                                                <td><?php echo $resident->contact_number;?></td>
                                                <td><?php echo $resident->purok;?></td>
                                                <td><?php echo date('Y/m/d h:i A', strtotime($resident->date_registered))?></td>
                                                <td class="d-flex justify-content-evenly">
                                                    <button class="btn btn-primary btn-sm rounded-pill viewResidentbtn"  data-bs-toggle="modal" data-id="<?php echo $resident->id?>" data-bs-target="#modalViewResident"><i class="fas fa-file-alt"></i></button>
                                                    <button class="btn btn-success btn-sm rounded-pill editResidentbtn" data-bs-toggle="modal" data-id="<?php echo $resident->id?>" data-bs-target="#modalEditResident" ><i class="fas fa-edit"></i></button>
                                                    <form action="<?php echo URLROOT?>/residents/delete_resident"  method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $resident->id ?>">
                                                        <!-- <button type="submit" onclick="residentDelete()" class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash-alt"></i></button> -->
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                        

                                </div>

                            </div>







                    </div>
                </main>   

                <!-- Modal for add resident -->

                <?php
                    require APPROOT . '/views/residents/modals/modal-view-resident.php';
                ?>

                <?php
                    require APPROOT . '/views/residents/modals/modal-edit-resident.php';
                ?>


<?php

    require APPROOT . '/views/includes/footer.php';
?>