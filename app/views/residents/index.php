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
                        <h3 class="mt-4">Residents</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Residents</li>
                        </ol>

                            <div class="card mb-4">
                                <div class="card-header">

                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                        <i class="fas fa-users"></i>
                                        Residents Section 
                                        </div>
                                        
                                        <div class="mb-3"> 
    <p>Monthly Income</p> 

    <form method="GET" action="<?php echo URLROOT . '/residents'; ?>" class="row gx-2 align-items-center">
        <div class="col-auto">
            <input 
                type="number" 
                name="min_income" 
                placeholder="Minimum Income" 
                class="form-control form-control-sm" 
                value="<?php echo isset($data['min_income']) ? $data['min_income'] : ''; ?>" 
                style="max-width: 150px;" 
                required
            >
        </div>
        <div class="col-auto">
            <input 
                type="number" 
                name="max_income" 
                placeholder="Maximum" 
                class="form-control form-control-sm" 
                value="<?php echo isset($data['max_income']) ? $data['max_income'] : ''; ?>" 
                style="max-width: 150px;" 
                required
            >
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-sm" style="font-size: 0.8rem; padding: 0.25rem 0.5rem;">
                <i class="fas fa-filter"></i> Filter
            </button>
        </div>
    </form>
</div>








                                        <div class="">
                                            <button type="button" id="addResidentBtn" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAddResident">
                                            <i class="fas fa-user-plus"></i>&nbsp; Add Resident
                                            </button>
                                        </div>
                                        <div class="">
                                            <a type="button" href="<?php echo URLROOT. '/residents/generate_resident' ?>" id="addResidentBtn" class="btn btn-primary btn-sm">
                                            <i class="fas fa-clipboard-list"></i>&nbsp;Generate List
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="card-body " id="printThis">


                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Civil Status</th>
                                                <th>Monthly Income</th>
                                                <th>Purok</th>
                                                <th>Contact Number</th>
                                                <th>Date Registered</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Civil Status</th>
                                                <th>Monthly Income</th>
                                                <th>Purok</th>
                                                <th>Contact Number</th>
                                                <th>Date Registered</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($data['residents'] as $resident):?>
                                            <tr>
                                                <td><?php echo $resident->last_name . ',' . $resident->first_name . ' ' .$resident->middle_name. ' ' . $resident->suffix; ?></td>
                                                <?php if($resident->gender == 'Male'){ ?>
                                                    <td><div class="badge rounded-pill bg-primary">&nbsp;<?php echo $resident->gender;?> &nbsp;</div></td> 
                                                <?php }else{ ?>
                                                    <td><div class="badge rounded-pill bg-danger"><?php echo $resident->gender;?></div></td> 
                                                    <?php } ?>
                                                <td><?php echo $resident->civil_status;?></td>
                                                <td><?php echo $resident->family_monthly_income;?></td>
                                                <td><?php echo $resident->purok;?></td>
                                                <td><?php echo $resident->contact_number;?></td>
                                                <td><?php echo date('Y/m/d h:i A', strtotime($resident->date_registered))?></td>
                                                <td class="d-flex justify-content-evenly">
                                                    <button class="btn btn-primary btn-sm rounded-pill viewResidentbtn"  data-bs-toggle="modal" data-id="<?php echo $resident->id?>" data-bs-target="#modalViewResident"><i class="fas fa-file-alt"></i></button>
                                                    <button class="btn btn-success btn-sm rounded-pill editResidentbtn" id="editOpen" data-bs-toggle="modal" data-id="<?php echo $resident->id?>" data-bs-target="#modalEditResident" ><i class="fas fa-edit"></i></button>
                                                    <form action="<?php echo URLROOT?>/residents/delete_resident"  method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $resident->id ?>">
                                                        <button type="submit" onclick="residentDelete()" class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash-alt"></i></button>
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
                    require APPROOT . '/views/residents/modals/modal-add-resident.php';
                ?>

                <?php
                    require APPROOT . '/views/residents/modals/modal-view-resident.php';
                ?>

                <?php
                    require APPROOT . '/views/residents/modals/modal-edit-resident.php';
                ?>




<?php

    require APPROOT . '/views/includes/footer.php';
?>