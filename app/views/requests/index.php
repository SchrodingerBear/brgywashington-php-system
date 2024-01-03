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
            <h3 class="mt-4">Facility Requests</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Facility Requests</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fas fa-building"></i>
                            Requests for Facilities
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                            <th>Facility</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Date & Time</th>
                                <th>Hours</th>
                                <th>Purpose</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['requests'] as $request): ?>
                            <tr id="row-<?php echo $request->id; ?>">
                            <td><?php echo $request->facility_id; ?></td>
                                <td><?php echo $request->name; ?></td>
                                <td><?php echo $request->contact; ?></td>
                                <td><?php echo $request->address; ?></td>
                                <td><?php echo date('Y/m/d h:i A', strtotime($request->datetime)); ?></td>
                                <td><?php echo $request->hours; ?></td>
                                <td><?php echo $request->purpose; ?></td>
                                <td id="status-<?php echo $request->id; ?>"><?php echo $request->status; ?></td>
                                <td>
                                    <button class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#statusModal" onclick="openModal(<?php echo $request->id; ?>, '<?php echo $request->name; ?>', '<?php echo $request->status; ?>')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Status Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Change Request Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalRequestName"></p>
                    <input type="hidden" id="modalRequestId">
                    <p>Do you want to approve or disapprove this request?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="updateStatus('Approved')">Approve</button>
                    <button type="button" class="btn btn-danger" onclick="updateStatus('Disapproved')">Disapprove</button>
                </div>
            </div>
        </div>
    </div>


<script>
function openModal(id, name, status) {
    document.getElementById('modalRequestId').value = id;
    document.getElementById('modalRequestName').innerText = `Request by: ${name}`;
}

function updateStatus(status) {
    const requestId = document.getElementById('modalRequestId').value;

    fetch('<?php echo URLROOT; ?>/requests/updateStatus', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: requestId, status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`status-${requestId}`).innerText = status;
            document.getElementById(`row-${requestId}`).classList.add('table-success');
            
            // Show success message
            const successMessage = document.createElement('div');
            successMessage.classList.add('alert', 'alert-success', 'mt-3');
            successMessage.innerText = 'Status updated successfully!';
            document.querySelector('.container-fluid').appendChild(successMessage);

            // Hide the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('statusModal'));
            modal.hide();

            // Remove success message after 3 seconds
            setTimeout(() => {
                successMessage.remove();
            }, 3000);
        } else {
            alert('Failed to update status. Please try again.');
        }
    });
}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php require APPROOT . '/views/includes/footer.php'; ?>
