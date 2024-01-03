<div class="modal fade" id="modalEditResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body overflow-hidden">
                                <form action="<?php echo URLROOT; ?>/residents/modalEditResident" method="POST" enctype="multipart/form-data">
                                    <div class="row g-4 ">

                                        <div class="col-sm-12 col-md-12 col-lg-4">
                                            <div class="row g-2  p-3 border border-2 rounded-3">
                                                <h6>PHOTO</h6>
                                                <div class="d-grid gap-2 col-12 mx-auto ">
                                                    <img src="<?php echo URLROOT .'/img/resident/placeholder.png'?>" class="img-thumbnail" onclick="editResidentTriggerClick()" id="editDisplayResident" alt="">
                                                    <label for="editResident" class="form-label btn btn-secondary btn-sm rounded-pill"><i class="fas fa-folder-open"></i>&nbsp;Browse</label>
                                                    <input class="form-control" type="file"  name="idPic" onchange="editedDisplayResident(this)" id="editResident">

                                                </div>
                                                <div class="col col-md-12">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-8 ">
                                            <div class="row g-2  p-3 border border-2 rounded-3">
                                                <h6>PERSONAL INFORMATION</h6>
                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <input type="number" name="id" id="editId" hidden>
                                                    <label for="editLastName" class="col-form-label-sm">Last Name</label>
                                                    <input type="text" name="lastName" class="form-control check_edit_resident check_edit_last_name" id="editLastName"required>
                                                    <small class="error_resident text-success position-absolute"></small>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editFirstName" class="col-form-label-sm">First Name</label>
                                                    <input type="text" name="firstName" class="form-control check_edit_resident check_edit_first_name" id="editFirstName"required>
                                                </div>
                                                <div class="col-6  col-md-3 input-group-sm">
                                                    <label for="editMiddleName" class="col-form-label-sm">Middle Name</label>
                                                    <input type="text" name="middleName" class="form-control check_edit_resident check_edit_middle_name" id="editMiddleName"required>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editSuffix" class="col-form-label-sm">Suffix</label>
                                                    <select id="editSuffix" name="suffix" class="form-select check_edit_resident check_edit_suffix">
                                                        <option value="" selected>None</option>
                                                        <option value="Jr.">Jr.</option>
                                                        <option value="Sr.">Sr.</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editGender" class="col-form-label-sm">Gender</label>
                                                    <select id="editGender" name="gender" class="form-select"required>
                                                    <option value="" selected>None</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm ">
                                                    <label for="editBirthDate" class="col-form-label-sm">Birth Date</label>
                                                    <input type="date" name="birthDate" class="form-control" id="editBirthDate"required>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editBirthPlace" class="col-form-label-sm">Birth Place</label>
                                                    <input type="text" name="birthPlace" class="form-control" id="editBirthPlace"required>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editAge" class="col-form-label-sm">Age</label>
                                                    <input type="number"  class="form-control" id="editAge"required readonly>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editCivilStatus" class="col-form-label-sm">Civil Status</label>
                                                    <select id="editCivilStatus" name="civilStatus" class="form-select"required>
                                                    <option value="" selected>Select</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                    </select>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editNationality" class="col-form-label-sm">Nationality</label>
                                                    <input type="text" name="nationality" class="form-control" id="editNationality"required>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editReligion" class="col-form-label-sm">Religion</label>
                                                    <input type="text" name="religion" class="form-control" id="editReligion">
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editOccupation" class="col-form-label-sm">Occupation</label>
                                                    <input type="text" name="occupation" class="form-control" id="editOccupation">
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editContactNum" class="col-form-label-sm">Contact Number</label>
                                                    <input type="text" name="contactNum" class="form-control" id="editContactNum">
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editPwd" class="col-form-label-sm">PWD?</label>
                                                    <select id="editPwd" name="pwd" class="form-select"required>
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                    </select>
                                                </div>

                                                
                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editPwdId" class="col-form-label-sm">PWD ID.No</label>
                                                    <input type="text" name="pwdId" class="form-control" id="editPwdId">
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editFamilyMonthlyIncome" class="col-form-label-sm">Family Monthly Income</label>
                                                    <input type="number" name="familyMonthlyIncome" class="form-control" id="editFamilyMonthlyIncome">
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editIndigent" class="col-form-label-sm">Indigent?</label>
                                                    <select id="editIndigent" name="indigent" class="form-select">
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editSoloParent" class="col-form-label-sm">Solo Parent?</label>
                                                    <select id="editSoloParent" name="soloParent" class="form-select">
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editSoloParentId" class="col-form-label-sm">Solo Parent ID No.</label>
                                                    <input type="text" name="soloParentId" class="form-control" id="editSoloParentId">
                                                </div>

                                                
                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editpantawidPamilya" class="col-form-label-sm">4ps member?</label>
                                                    <select id="editpantawidPamilya" name="pantawidPamilya" class="form-select">
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editVoter" class="col-form-label-sm">Register Voter?</label>
                                                    <select id="editVoter" name="voter" class="form-select"required>
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                    </select>
                                                </div>


                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editPurok" class="col-form-label-sm">Purok No.</label>
                                                    <select id="editPurok" name="purok" class="form-select"required>
                                                    <option value="" selected>Select</option>
                                                    <option value="Purok Anthorium">Purok Anthorium</option>
<option value="Purok Asparagus">Purok Asparagus</option>
<option value="Purok Azucena">Purok Azucena</option>
<option value="Purok Bagong Silang-1">Purok Bagong Silang-1</option>
<option value="Purok Bagong Silang-2A">Purok Bagong Silang-2A</option>
<option value="Purok Bagong Silang-2B">Purok Bagong Silang-2B</option>
<option value="Purok Bagong Silang-3">Purok Bagong Silang-3</option>
<option value="Purok Bombils">Purok Bombils</option>
<option value="Purok Cadena de Amor">Purok Cadena de Amor</option>
<option value="Purok Candava A">Purok Candava A</option>
<option value="Purok Candava B">Purok Candava B</option>
<option value="Purok Candava C">Purok Candava C</option>
<option value="Purok Capitol Hills">Purok Capitol Hills</option>
<option value="Purok Convention">Purok Convention</option>
<option value="Purok Dahlia">Purok Dahlia</option>
<option value="Purok Everlasting">Purok Everlasting</option>
<option value="Purok Gemelina">Purok Gemelina</option>
<option value="Purok Ipil-ipil">Purok Ipil-ipil</option>
<option value="Purok Kalipayan-A">Purok Kalipayan-A</option>
<option value="Purok Kalipayan-B">Purok Kalipayan-B</option>
<option value="Purok Kalipayan-C">Purok Kalipayan-C</option>
<option value="Purok Mabungahon">Purok Mabungahon</option>
<option value="Purok Madasigon">Purok Madasigon</option>
<option value="Purok Malipayon">Purok Malipayon</option>
<option value="Purok Marigold">Purok Marigold</option>
<option value="Purok Mariposa">Purok Mariposa</option>
<option value="Purok Matinabangon">Purok Matinabangon</option>
<option value="Purok Million">Purok Million</option>
<option value="Purok Orchids">Purok Orchids</option>
<option value="Purok Pag-asa">Purok Pag-asa</option>
<option value="Purok Palmera">Purok Palmera</option>
<option value="Purok Pantalan-l">Purok Pantalan-l</option>
<option value="Purok Phivolcs A">Purok Phivolcs A</option>
<option value="Purok Phivolcs B">Purok Phivolcs B</option>
<option value="Purok Rose">Purok Rose</option>
<option value="Purok Rosas">Purok Rosas</option>
<option value="Purok Sampaguita">Purok Sampaguita</option>
<option value="Purok Santan">Purok Santan</option>
<option value="Purok Sunflower">Purok Sunflower</option>
<option value="Purok Upper Bonotan">Purok Upper Bonotan</option>
<option value="Purok Villa Corito">Purok Villa Corito</option>
<option value="Purok Waling-Waling">Purok Waling-Waling</option>
<option value="Purok llang-ilang">Purok llang-ilang</option>

                                                    </select>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editHouseNo" class="col-form-label-sm">House No.</label>
                                                    <input type="text" name="houseNo" class="form-control" id="editHouseNo">
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm">
                                                    <label for="editStreet" class="col-form-label-sm">Street</label>
                                                    <input type="text" name="street"  class="form-control" id="editStreet">
                                                </div>
                                                

                                            </div>

            
                                            
                                        </div>



                                        <div class="col-sm-12 col-md-12 col-lg-4">

                                            <div class="row g-2 p-3 border border-2 rounded-3">
                                                <h6>IN CASE OF EMERGENCY</h6>
                                                <div class="col-6 col-md-12 input-group-sm">
                                                    <label for="editToContactFullName" class="col-form-label-sm">Full Name</label>
                                                    <input type="text" name="toContactFullName"  class="form-control" id="editToContactFullName">
                                                </div>

                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="editToContactRelationship" class="col-form-label-sm">Relationship</label>
                                                    <input type="text" name="toContactRelationship" class="form-control" id="editToContactRelationship">
                                                </div>

                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="editToContactNumber" class="col-form-label-sm">Contact No.</label>
                                                    <input type="text" name="toContactNumber" class="form-control" id="editToContactNumber">
                                                </div>

                                                <div class="col-6 col-md-12 input-group-sm">
                                                    <label for="editAddress" class="col-form-label-sm">Address</label>
                                                    <input type="text" name="toContactAddress"  class="form-control" id="editToContactAddress">
                                                </div>


                                            </div>
                                        </div>

                                        
                                        <div class="col-sm-12 col-md-12 col-lg-8">
                                            <div class="row g-2 border border-2 rounded-3">
                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                    <div class="row g-2 p-3 ">
                                                        <h6>OTHER DETAILS</h6>
                                                        
                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editNationalIdNo" class="col-form-label-sm">National ID No.</label>
                                                            <input type="text" name="nationalIdNo"  class="form-control" id="editNationalIdNo">
                                                        </div>
                                                        
                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editToPhilhealth" class="col-form-label-sm">Philhealth No.</label>
                                                            <input type="text" name="philhealthNo"  class="form-control" id="editPhilhealthNo">
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editSssNo" class="col-form-label-sm">SSS No.</label>
                                                            <input type="text" name="sssNo" class="form-control" id="editSssNo">
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="pagibigNo" class="col-form-label-sm">Pagibig No.</label>
                                                            <input type="text" name="pagibigNo" class="form-control" id="pagibigNo">
                                                        </div>


                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editTinNo" class="col-form-label-sm">TIN No.</label>
                                                            <input type="text" name="tinNo"  class="form-control" id="editTinNo">
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editVotersIdNo" class="col-form-label-sm">Voters ID No.</label>
                                                            <input type="text" name="votersIdNo"  class="form-control" id="editVotersIdNo">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                    <div class="row g-2 p-3">
                                                        <h6 class="invisible">>OTHER DETAILS</h6>
                                                        
                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editCovidStatus" class="col-form-label-sm">Covid Status</label>
                                                            <select id="editCovidStatus" name="covidStatus" class="form-select">
                                                            <option value="" selected>Mark as:</option>
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                            <option value="Unidentified">Unidentified</option>
                                                            </select>
                                                        </div>
                                                        


                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editVaccinated" class="col-form-label-sm">Vaccinated</label>
                                                            <select id="editVaccinated" name="vaccinated" class="form-select">
                                                            <option value="No" selected>No</option>
                                                            <option value="Yes">Yes</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editDateOfRegistration" class="col-form-label-sm">Date of Registration</label>
                                                            <input type="text" class="form-control" id="editDateOfRegistration" readonly>
                                                        </div>
                                                        

                                                        <div class="col-6 col-md-6 input-group-sm">
                                                            <label for="editDateOfDeath" class="col-form-label-sm">Date of Death</label>
                                                            <input type="date" name="dateOfDeath"  class="form-control" id="editDateOfDeath">
                                                        </div>

                                                        <label class="col-form-label-sm">Alive or Deseased</label>
                                                        <div class="btn-group mt-0" role="group" aria-label="Basic radio toggle button group">
                                                            <input type="radio" class="btn-check" name="status" value="Alive" id="editAlive" autocomplete="off" checked>
                                                            <label class="btn btn-outline-primary btn-sm rounded-pill" for="editAlive"><i class="fas fa-heart"></i>&nbsp;</label>

                                                            <input type="radio" class="btn-check" name="status" value="Deseased" id="editDeseased" autocomplete="off">
                                                            <label class="btn btn-outline-danger btn-sm rounded-pill" for="editDeseased"><i class="fas fa-skull-crossbones"></i>&nbsp;</label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-4">

   
                                        </div>



                                    </div>


 


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success edit_success"><i class="fas fa-print"></i>Save</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>