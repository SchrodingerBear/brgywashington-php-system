<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/admin/navigation.php';
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                            <h3 class="mt-4">Barangay Details</h3>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Barangay Details</li>
                                </ol>
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-info-circle"></i>
                                                Barangay Details
                                            </div>
                                            <div class="card-body ">
                                                <form action="<?php echo URLROOT; ?>/admins/barangay_detail" method="POST" enctype="multipart/form-data">
                                                    <div class="row px-5 d-flex align-items-center justify-content-center">
                                                        <div class="col-xl-6">
                                                            <div class="row">
                                                            <div class="col-12 col-md-12 input-group-sm">
                                                                    <label for="formGroupprovinceInput" class="col-form-label-sm">PROVINCE</label>
                                                                    <input type="text" class="form-control" id="formGroupprovinceInput" name="province" value="<?php echo $data['detail']->province?>">
                                                                </div>

                                                                <div class="col-12 col-md-12 input-group-sm">
                                                                    <label for="formGroupmunicipalityInput" class="col-form-label-sm">MUNICIPALITY</label>
                                                                    <input type="text" class="form-control" id="formGroupmunicipalityInput" name="municipality" value="<?php echo $data['detail']->municipality?>">
                                                                </div>

                                                                <div class="col-12 col-md-12 input-group-sm">
                                                                    <label for="formGroupbrgyNameInput" class="col-form-label-sm">BARANGAY </label>
                                                                    <input type="text" class="form-control" id="formGroupbrgyNameInput" name="brgyName" value="<?php echo $data['detail']->brgy_name?>">
                                                                </div>

                                                               
                                                                <div class="col-12 col-md-12 input-group-sm">
                                                                    <label for="formGroupNumberInput" class="col-form-label-sm">MOBILE NO.</label>
                                                                    <input type="text" class="form-control" id="formGroupbrgyNumberInput" name="mobileNumber" value="<?php echo $data['detail']->mobile_number?>">
                                                                </div>
                                                                <div class="col-12 col-md-12 input-group-sm">
                                                                    <label for="formGroupNumberInput" class="col-form-label-sm">EMAIL</label>
                                                                    <input type="text" class="form-control" id="formGroupbrgyEmailInput" name="email" value="<?php echo $data['detail']->email?>">
                                                                </div>
                                                                <div class="col-12 col-md-12 input-group-sm">
                                                                    <label for="formGroupNumberInput" class="col-form-label-sm">TAG LINE</label>
                                                                    <input type="text" class="form-control" id="formGroupbrgyTaglineInput" name="tagline" value="<?php echo $data['detail']->tagline?>">
                                                                </div>
                                                                <div class="col-12 col-md-12 input-group-sm">
                                                                    <label for="formGroupNumberInput" class="col-form-label-sm">ABOUT</label>
                                                                    <textarea class="form-control" id="formGroupAboutInput" name="about" rows="4" ><?php echo $data['detail']->about?></textarea>
                                                                </div>
                                                                <div class="col-12 col-md-12 input-group-sm">
                                                                    <label for="formGroupBrgyCaptInput" class="col-form-label-sm">BARANGAY CAPTAIN</label>
                                                                    <input type="text" class="form-control" id="formGroupBrgyCaptInput" name="brgyCaptain" value="<?php echo $data['detail']->brgy_captain?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div class="">
                                                            <div class="col-6 col-md-6 offset-md-3">
    <div class="mb-3 text-center">
        <img src="<?php echo URLROOT . '/img/' . $data['detail']->pic_logo; ?>" onclick="triggerClick('logo')" class="img-thumbnail rounded-circle" id="logoDisplay" alt="Logo">
        <label for="formLogo" class="form-label btn btn-secondary rounded-pill btn-sm"><i class="fas fa-edit"></i>&nbsp;Change</label>
        <input class="form-control" type="file" name="changeLogo" onchange="displayLogo(this, 'logo')" id="formLogo" accept="image/png" style="display:none;">
    </div>
</div>

<!-- Background Image Section -->
<div class="col-6 col-md-6 offset-md-3">
    <div class="mb-3 text-center">
        <img src="<?php echo URLROOT . '/img/' . $data['detail']->bg_image; ?>" onclick="triggerClick('bg')" class="img-thumbnail rounded-circle" id="bgDisplay" alt="Background">
        <label for="formBG" class="form-label btn btn-secondary rounded-pill btn-sm"><i class="fas fa-edit"></i>&nbsp;Change</label>
        <input class="form-control" type="file" name="changebg" onchange="displaybg(this, 'bg')" id="formBG" accept="image/png" style="display:none;">
    </div>
</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 d-flex justify-content-end">
                                                        <div class="mb-3">
                                                            <button type="submit" name="btn-update" class="btn btn-success btn-sm rounded-pill btn-block">Save Changes</button>
                                                        </div>

                                                    </div>
                                                    </div>


                                                    
                                                </form>

                                                    

                                            </div>
                                        </div>



                    </div>
                </main>

                <script>
// Function to trigger the input click for logo or background
function triggerClick(type) {
    if (type == 'logo') {
        document.getElementById('formLogo').click();
    } else if (type == 'bg') {
        document.getElementById('formBG').click();
    }
}

// Function to display the selected logo or background image
function displayLogo(input, type) {
    var reader = new FileReader();
    reader.onload = function(e) {
        if (type == 'logo') {
            document.getElementById('logoDisplay').setAttribute('src', e.target.result);
        } else if (type == 'bg') {
            document.getElementById('bgDisplay').setAttribute('src', e.target.result);
        }
    }
    reader.readAsDataURL(input.files[0]);
}
function displaybg(input, type) {
    var reader = new FileReader();
    reader.onload = function(e) {
        if (type == 'bg') {
            document.getElementById('bgDisplay').setAttribute('src', e.target.result);
        } else if (type == 'go') {
            document.getElementById('logoDisplay').setAttribute('src', e.target.result);
        }
    }
    reader.readAsDataURL(input.files[0]);
}
</script>

<?php
    require APPROOT . '/views/includes/footer.php';
?>