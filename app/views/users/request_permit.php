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
                        <div class="card mb-2 col-12 offset-md-3 col-md-6 mt-3 mb-5">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-2"><a href="javascript:history.go(-1)"><i class="fas fa-arrow-left"></i></a></div>
                                    <div class="col-8 col-md-12 ">
                                    <h4 class="mx-auto text-center">Barangay Permit</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body ">
                                <form action="<?php echo URLROOT; ?>/users/request_permit" method="POST">
                                    <div class="row g-2 pb-3">
                                        <div class="col-6 col-md-6">
                                            <label for="inputLastName" class="form-label-sm">Last Name</label>
                                            <input type="text" value="<?php echo $_SESSION['lastname'] ?>" name="lastName" class="form-control" id="inputLastName" readonly>
                                            <div class="validation-invalid"><?php echo $data['last_nameError'] ?></div>                               
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <label for="inputFirstName" class="form-label-sm">First Name</label>
                                            <input type="text" value="<?php echo $_SESSION['firstname'] ?>" name="firstName" class="form-control" id="inputFirstName" readonly>
                                            <div class="validation-invalid"><?php echo $data['first_nameError'] ?></div>  
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <label for="inputMiddleName" class="form-label-sm">Middle Name</label>
                                            <input type="text" value="<?php echo $_SESSION['middlename'] ?>" name="middleName" class="form-control" id="inputMiddleName" readonly>
                                            <div class="validation-invalid"><?php echo $data['middle_nameError'] ?></div>  
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="inputSuffix" class="form-label-sm">Suffix</label>
                                            <input type="text" value="<?php echo $_SESSION['suffix'] ?>" name="suffix" class="form-control" id="inputSuffix" readonly>
                                            </select>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <label for="inputContactNum" class="form-label-sm">Contact Number</label>
                                            <input type="text" value="<?php echo $data['contact_number'] ?>" name="contactNum" class="form-control" id="inputContactNum">
                                            <div class="validation-invalid"><?php echo $data['contact_numberError'] ?></div>  
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <label for="inputFormType" class="form-label-sm">Type of Certificate</label>
                                            <input class="form-control" type="text" name="formType"  value="Barangay Permit" id="inputFormType" readonly>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="inputPurpose"  class="form-label-sm">Name Of Business</label>
                                            <input type="text" value="<?php echo $data['business_name'] ?>" name="businessName" class="form-control" id="inputPurpose">
                                            <div class="validation-invalid"><?php echo $data['business_nameError'] ?></div>  
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <label for="inputOperLastName" class="form-label-sm">Operator Last Name</label>
                                            <input type="text" value="<?php echo $data['oper_lastname'] ?>" class="form-control" name="operLastName" id="inputOperLastName">
                                            <div class="validation-invalid"><?php echo $data['oper_lastNameError'] ?></div>                               
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <label for="inputOperFirstName" class="form-label-sm">Operator First Name</label>
                                            <input type="text"  value="<?php echo $data['oper_firstname'] ?>" class="form-control" name="operFirstName" id="inputOperFirstName">
                                            <div class="validation-invalid"><?php echo $data['oper_firstNameError'] ?></div>  
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <label for="inputMiddleName" class="form-label-sm">Operator Middle Name</label>
                                            <input type="text" value="<?php echo $data['oper_middlename'] ?>" class="form-control" name="operMiddleName" id="inputOperMiddleName">
                                            <div class="validation-invalid"><?php echo $data['oper_middleNameError'] ?></div>  
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="inputSuffix" class="form-label-sm">Suffix</label>
                                            <select id="inputSuffix" name="operSuffix" class="form-select">
                                            <option selected>None</option>
                                            <option>Jr.</option>
                                            <option>Sr.</option>
                                            </select>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <label for="inputPurpose"  class="form-label-sm">Purpose</label>
                                            <input type="text" value="<?php echo $data['purpose'] ?>" name="purpose" class="form-control" id="inputPurpose">
                                            <div class="validation-invalid"><?php echo $data['purposeError'] ?></div>  
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="inputQty"  class="form-label-sm">Quantity</label>
                                            <input type="text" value="<?php echo $data['qty'] ?>" name="qty" class="form-control" id="inputQty">
                                            <div class="validation-invalid"><?php echo $data['qtyError'] ?></div>  
                                        </div>
                                        <div class="d-grid gap-2 col-6 pt-3 mx-auto">
                                            <button class="btn btn-primary" type="submit"><h6 class="my-auto">Submit</h6></button>
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