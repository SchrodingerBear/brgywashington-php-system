<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    if($_SESSION['account_type'] == 0){
        require APPROOT . '/views/includes/user/navigation.php'; 
    }
    if($_SESSION['account_type'] == 2){
        require APPROOT . '/views/includes/bhw/navigation.php'; 
    }
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-2 col-12 offset-md-4 col-md-4 mt-5 mb-5">

                            <div class="card-body ">
                                <form action="<?php echo URLROOT; ?>/users/password" method="POST">
                                    <div class="row g-3">

                                        <div class="col-12 col-md-12">
                                            <input type="password" class="form-control" placeholder="Current password" name="currentPassword" aria-label="Current password">
                                            <div class="validation-invalid"><?php echo $data['current_passwordError'] ?></div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <input type="password" class="form-control" placeholder="New password" name="newPassword" aria-label="New password">
                                            <div class="validation-invalid"><?php echo $data['new_passwordError'] ?></div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <input type="password" class="form-control" placeholder="Re-type new password" name="confirmNewPassword" aria-label="Re-type new password">
                                            <div class="validation-invalid"><?php echo $data['confirm_new_passwordError'] ?></div>
                                        </div>

                                        <div class="d-grid gap-2 col-12 mx-auto">
                                            <button class="btn btn-primary" type="submit"><h6 class="my-auto">Save Changes</h6></button>
                                        </div>
                                        <div class="d-grid gap-2 col-12 mx-auto">
                                            <a class="btn btn-secondary" href="<?php echo URLROOT . '/users'?>"><h6 class="my-auto">Cancel</h6></a>
                                        </div>
                                    </div>
                                </form>   
                            </div>
                        </div>  
                    </div>
                </main>





<?php
    require APPROOT . '/views/includes/footer.php';
?>