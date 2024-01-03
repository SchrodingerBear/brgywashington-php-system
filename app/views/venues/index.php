<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    if ($_SESSION['account_type'] == 1) {
        require APPROOT . '/views/includes/admin/navigation.php'; 
    }
    if ($_SESSION['account_type'] == 2) {
        require APPROOT . '/views/includes/bhw/navigation.php'; 
    }
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Facilities</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Facilities</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <i class="fas fa-building"></i>
                            Facility Section
                        </div>

                        <div class="">
                            <button type="button" id="addVenueBtn" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAddVenue">
                                <i class="fas fa-plus"></i>&nbsp; Add Facility
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body" id="printThis">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Location</th>
                                <th>Rate/hr</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            
                                <th>Name</th>
                                <th>Location</th>
                                <th>Rate/hr</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php 
                        // Loop through the venues fetched from the database
                        foreach ($data['venues'] as $venue): ?>
                            <tr>
                               
                                <td><?php echo $venue->Name; ?></td> 
                                <td><?php echo $venue->Location; ?></td> 
                                <td><?php echo $venue->Capacity; ?></td> 
                                <td><?php echo date('Y/m/d h:i A', strtotime($venue->Date_Added))?></td><!-- Date Added column -->
                                <td class="d-flex justify-content-evenly">
                                    <!-- Edit Venue Button -->
                                    <button class="btn btn-success btn-sm rounded-pill editVenueBtn" data-bs-toggle="modal" data-id="<?php echo $venue->id; ?>" data-bs-target="#modalEditVenue">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Delete Venue Form -->
                                   <!-- Delete Venue Form -->
<!-- Delete Venue Form -->
<form action="<?php echo URLROOT; ?>/venues/delete/<?php echo $venue->id; ?>" method="POST" id="deleteForm<?php echo $venue->id; ?>">
    <input type="hidden" name="id" value="<?php echo $venue->id; ?>">
    <button type="button" onclick="venueDelete('deleteForm<?php echo $venue->id; ?>')" class="btn btn-danger btn-sm rounded-pill">
        <i class="fas fa-trash-alt"></i>
    </button>
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

    <!-- Modal for Add Venue -->
    <?php require APPROOT . '/views/venues/modals/modal-add-venue.php'; ?>

    <!-- Modal for Edit Venue -->
    <?php require APPROOT . '/views/venues/modals/modal-edit-venue.php'; ?>

    <script>
    // Function to confirm venue deletion
    function venueDelete(formId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this venue?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the specific form by ID
                document.getElementById(formId).submit();
            }
        });
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    require APPROOT . '/views/includes/footer.php';
?>
