
<?php require APPROOT . '/views/includes/head.php'; ?>

<?php
if ($_SESSION['account_type'] == 0) {
    require APPROOT . '/views/includes/user/navigation.php';
}
if ($_SESSION['account_type'] == 2) {
    require APPROOT . '/views/includes/bhw/navigation.php';
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-3">
            <nav class="mt-4">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link myrequest-tab active" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="true">
                        <span style="font-size: 8pt;font-weight:bold;">Announcements</span>
                    </button>
                </div>
            </nav>

            <div class="tab-pane fade show active pt-2" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
    <div class="row">
        <?php if(!$data['posts']){ echo "<h6 class='ps-3 d-flex justify-content-center'>Empty</h6>";} ?>
        <?php foreach ($data['posts'] as $post): ?>
            <div class="card col-12 col-md-4">
                <div class="card-body row">
                    <div class="col-9">
                        <h5 class="card-title"><?php echo $post->title ?></h5>
                        <p class="card-text">
                            Date Posted: <?php echo formatDateTime($post->created_at); ?><br>
                            Description: <?php echo $post->body ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


            <!-- Modal for certificate of indigency -->
            <?php require APPROOT . '/views/users/modals/modal-detail-indigency.php'; ?>

            <!-- Modal for certificate of barangay permit -->
            <?php require APPROOT . '/views/users/modals/modal-detail-permit.php'; ?>    

            <!-- Modal for certificate of barangay residency -->
            <?php require APPROOT . '/views/users/modals/modal-detail-residency.php'; ?>       

            <!-- Modal for certificate of barangay clearance -->
            <?php require APPROOT . '/views/users/modals/modal-detail-clearance.php'; ?> 

            <!-- Modal for certificate of barangay clearance id -->
            <?php require APPROOT . '/views/users/modals/modal-detail-clearance-id.php'; ?>  

        </div>
    </main>

<?php
    require APPROOT . '/views/includes/footer.php';
?>

<?php
// Function to display time ago
// Function to format date and time
function formatDateTime($datetime) {
    $date = new DateTime($datetime);
    return $date->format('F j, Y g:i A'); // Example: December 4, 2024 2:30 PM
}

?>
