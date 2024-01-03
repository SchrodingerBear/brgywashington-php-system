<?php
// Include database connection
require_once('../app/libraries/Database.php');

// Create a new instance of the Database class
$db = new Database();

// Initialize default values
$logo = 'public/img/default_logo.png';
$mobile_number = 'Not Available';
$email = 'Not Available';
$address = 'Not Available';
$brgy_name = 'Not Available';
$about = 'Not Available';
$province = 'Not Available';
$municipality = 'Not Available';

// Fetch data from the database using PDO
$sql = "SELECT brgy_name, pic_logo, about,province, municipality, mobile_number, address, email FROM brgy_detail LIMIT 1";
$db->query($sql);

$row = $db->single(); // Fetch a single record as an object

if ($row) {
    // Construct the URL for the logo and update other variables
    $logo = !empty($row->pic_logo) ? 'public/img/' . $row->pic_logo : $logo;
    $mobile_number = $row->mobile_number ?? $mobile_number;
    $email = $row->email ?? $email;
    $address = $row->address ?? $address;
    $brgy_name = $row->brgy_name ?? $brgy_name;
    $about = $row->about ?? $about;
    $province = $row->province ?? $province;
    $municipality = $row->municipality ?? $municipality;
}
?>




<?php
    require APPROOT . '/views/includes/head.php';
?>


<div id="layoutSidenav_content">
                <main class="login-container" style="height:100vh;">
                    <div class="container-fluid px-4 "><br>
                    <img src="<?php echo URLROOT . '/' . htmlspecialchars($logo) . '?v=' . time(); ?>" class="img-fluid rounded-circle mx-auto d-none d-md-block" style="width: 100px;" alt="...">
                        <h2 class="mt-1 text-center text-success fw-bold">Brgy. <?php echo htmlspecialchars($brgy_name); ?></h2>

                            <div class="card mb-2 col-12 offset-md-4 col-md-4 mt-4 mb-5">
                                <div class="card-header">

                                    <div class="row">
                                        <div class="col-12 col-md-12 mx-auto">
                                        <h4 class="mx-auto text-secondary text-center">Sign up</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body ">
                                    <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                                        <div class="row g-3">

                                            <div class="col-6 col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $data['lastName'] ?>" placeholder="Last name" name="lastName" aria-label="Last name">
                                                <div class="validation-invalid"><?php echo $data['lastNameError'] ?></div>

                                            </div>

                                            <div class="col-6 col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $data['firstName'] ?>" placeholder="First name" name="firstName"  aria-label="First name">
                                                <div class="validation-invalid"><?php echo $data['firstNameError'] ?></div>
                                            </div>

                                            <div class="col-6 col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $data['middleName'] ?>" placeholder="Middle name" name="middleName"  aria-label="Middle name">
                                                <div class="validation-invalid"><?php echo $data['middleNameError'] ?></div>
                                            </div>

                                            <div class="col-6 col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $data['suffix'] ?>" placeholder="Suffix" name="suffix" aria-label="Suffix">
                                                <div class="validation-invalid"><?php echo $data['suffixError'] ?></div>
                                            </div>

                                                
                                            <div class="col-12 col-md-12">
                                                <input type="text" class="form-control" value="<?php echo $data['username'] ?>" placeholder="Username" name="username" aria-label="Username">
                                                <div class="validation-invalid"><?php echo $data['usernameError'] ?></div>  
                                            </div>

                                            <div class="col-12 col-md-12">
                                                <input type="password" class="form-control"  placeholder="New password" name="password" aria-label="New password">
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <input type="password" class="form-control" placeholder="Confirm password" name="confirmPassword" aria-label="Confirm password">
                                                <div class="validation-invalid"><?php echo $data['passwordError'] ?></div>
                                            </div>


                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <button class="btn btn-primary " type="submit"><h6 class="my-auto">Sign Up</h6></button>
                                            </div>
                                            <div class="col-12 col-md-12 text-center">
                                                <p class="already-have"><a href="<?php echo URLROOT; ?>/users/login">Already have an account ?</a></p>
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