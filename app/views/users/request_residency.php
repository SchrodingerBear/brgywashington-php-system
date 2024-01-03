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
                    <div class="container-fluid px-2">
                        <div class="card mb-2 col-12 offset-md-2 col-md-8 mt-3 mb-5">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-2"><a href="javascript:history.go(-1)"><i class="fas fa-arrow-left"></i></a></div>
                                    <div class="col-8 col-md-12 ">
                                    <h4 class="mx-auto text-center">Barangay Residency</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body ">
                                <form action="<?php echo URLROOT; ?>/users/request_residency" method="POST">
                                    <div class="row g-2 pb-3">
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputLastName" class="col-form-label-sm">Last Name</label>
                                            <input type="text" value="<?php echo $_SESSION['lastname'] ?>" name="lastName" class="form-control" id="inputLastName"readonly>
                                            <div class="validation-invalid"><?php echo $data['last_nameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputFirstName" class="col-form-label-sm">First Name</label>
                                            <input type="text" value="<?php echo $_SESSION['firstname'] ?>" name="firstName" class="form-control" id="inputFirstName"readonly>
                                            <div class="validation-invalid"><?php echo $data['first_nameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputMiddleName" class="col-form-label-sm">Middle Name</label>
                                            <input type="text" value="<?php echo $_SESSION['middlename'] ?>" name="middleName" class="form-control" id="inputMiddleName"readonly>
                                            <div class="validation-invalid"><?php echo $data['middle_nameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputSuffix" class="col-form-label-sm">Suffix</label>
                                            <input type="text" value="<?php echo $_SESSION['suffix'] ?>" name="suffix" class="form-control" id="inputSuffix"readonly>
                                        </div>

                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputGender" class="col-form-label-sm">Gender</label>
                                            <input type="text" name="gender" value="<?php echo $data['myData']->gender ?>" name="suffix" class="form-control" id="inputGender"readonly>
                                            <div class="validation-invalid"><?php echo $data['genderError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm ">
                                        <label for="inputBirthDate" class="col-form-label-sm">Birth Date</label>
                                        <input type="date" value="<?php echo $data['myData']->birth_date?>" name="birthDate" class="form-control" id="inputBirthDate" readonly>
                                        <div class="validation-invalid"><?php echo $data['birth_dateError'] ?></div>
                                        </div>

                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputBirthPlaceinputContactNum" class="col-form-label-sm">Birth Place</label>
                                            <input type="text" value="<?php echo $data['myData']->birth_place ?>" name="birthPlace" class="form-control" id="inputBirhtPlace" readonly>
                                            <div class="validation-invalid"><?php echo $data['birth_placeError'] ?></div>
                                        </div>

                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputContactNum" class="col-form-label-sm">Contact Number</label>
                                            <input type="text" value="<?php echo $data['myData']->contact_number ?>" name="contactNum" class="form-control" id="inputContactNum">
                                            <div class="validation-invalid"><?php echo $data['contact_numberError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputFaLastName" class="col-form-label-sm">Father's Last Name</label>
                                            <input type="text" value="<?php echo $data['faLastName'] ?>" name="faLastName" class="form-control" id="inputFaLastName">
                                            <div class="validation-invalid"><?php echo $data['faLastNameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputFaFirstName" class="col-form-label-sm">Father's First Name</label>
                                            <input type="text" value="<?php echo $data['faFirstName'] ?>" name="faFirstName" class="form-control" id="inputFaFirstName">
                                            <div class="validation-invalid"><?php echo $data['faFirstNameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputFaMiddleName" class="col-form-label-sm">Father's Middle Name</label>
                                            <input type="text" value="<?php echo $data['faMiddleName'] ?>" name="faMiddleName" class="form-control" id="inputFaMiddleName">
                                            <div class="validation-invalid"><?php echo $data['faMiddleNameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputSuffix" class="col-form-label-sm">Father's Suffix</label>
                                            <select id="inputSuffix" name="faSuffix" class="form-select">
                                            <option value="" selected>None</option>
                                            <option value="Jr.">Jr.</option>
                                            <option value="Sr.">Sr.</option>
                                            </select>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputMoMaidenName" class="col-form-label-sm">Mother's Maiden Name</label>
                                            <input type="text" value="<?php echo $data['moMaidenName'] ?>" name="moMaidenName" class="form-control" id="inputMoMaidenName">
                                            <div class="validation-invalid"><?php echo $data['moMaidenNameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputMoFirstName" class="col-form-label-sm">Mother's First Name</label>
                                            <input type="text" value="<?php echo $data['moFirstName'] ?>" name="moFirstName" class="form-control" id="inputMoFirstName">
                                            <div class="validation-invalid"><?php echo $data['moFirstNameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputMoMiddleName" class="col-form-label-sm">Mother's Middle Name</label>
                                            <input type="text" value="<?php echo $data['moMiddleName'] ?>" name="moMiddleName" class="form-control" id="inputMoMiddleName">
                                            <div class="validation-invalid"><?php echo $data['moMiddleNameError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputSuffix" class="col-form-label-sm">Mother's Suffix</label>
                                            <select id="inputSuffix" name="moSuffix" class="form-select">
                                            <option value="" selected>None</option>
                                            <option value="Jr.">Jr.</option>
                                            <option value="Sr.">Sr.</option>
                                            </select>
                                        </div>        
                                        <div class="col-12 col-md-6 input-group-sm">
                                            <label for="inputFormType" class="col-form-label-sm">Type of Certificate</label>
                                            <input class="form-control" type="text" name="formType"  value="Barangay Residency" id="inputFormType" readonly>
                                        </div>
                                        
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputPurpose"  class="col-form-label-sm">Purpose</label>
                                            <input type="text" value="<?php echo $data['purpose'] ?>" name="purpose" class="form-control" id="inputPurpose">
                                            <div class="validation-invalid"><?php echo $data['purposeError'] ?></div>
                                        </div>
                                        <div class="col-6 col-md-3 input-group-sm">
                                            <label for="inputQty"  class="col-form-label-sm">Quantity</label>
                                            <input type="text" value="<?php echo $data['qty'] ?>" name="qty" class="form-control" id="inputQty">
                                            <div class="validation-invalid"><?php echo $data['qtyError'] ?></div>
                                        </div>
                                        <div class="d-grid gap-2 col-6 pt-3 mx-auto">
                                            <button class="btn btn-primary " type="submit"><h6 class="my-auto">Submit</h6></button>
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