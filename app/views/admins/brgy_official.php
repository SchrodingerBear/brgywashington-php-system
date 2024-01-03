<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/admin/navigation.php';
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                            <h3 class="mt-4">Barangay Officials</h3>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Barangay Officials</li>
                                </ol>
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-info-circle"></i>
                                                Barangay Officials
                                            </div>
                                            <div class="card-body ">
                                                <form action="<?php echo URLROOT; ?>/admins/brgy_official" method="POST" enctype="multipart/form-data">

                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Full name</th>
                                                        <th scope="col">Committee</th>
                                                        <th scope="col">Position</th>
                                                        <th scope="col">Contact No.</th>
                                                        <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($data['officials'] as $official):?>
                                                        <tr>
                                                            <td><?php echo $official->fullname?></td>
                                                            <td><?php echo $official->committee;?></td>
                                                            <td><?php echo $official->position;?></td>
                                                            <td><?php echo $official->contact_number;?></td>
                                                            <td class="d-flex justify-content-center">
                                                                <!-- <button class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-id="" data-bs-target="#modalEditOfficial"><i class="fas fa-user-edit"></i>&nbsp;Edit</button> -->
                                                                <a class="btn btn-success btn-sm rounded-pill officialBtn" type="button" data-bs-toggle="modal"  data-id="<?php echo $official->id?>" data-bs-target="#modalEditOfficial"><i class="fas fa-user-edit"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>



                                                    
                                                </form>

                                            </div>
                                        </div>



                    </div>
                </main>
                        <?php
                            require APPROOT . '/views/admins/modals/modal-edit-official.php';
                        ?>

<?php
    require APPROOT . '/views/includes/footer.php';
?>