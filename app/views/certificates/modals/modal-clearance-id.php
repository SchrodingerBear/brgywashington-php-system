ClearanceId<div class="modal fade" id="modalClearanceId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body overflow-hidden">
                                <form action="<?php echo URLROOT; ?>/certificates/modalClearanceId" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <img src="<?php echo URLROOT .'/img/img-placeholder.jpg'?>" class="img-thumbnail walkInId" onclick="clearancetriggerClick()" id="idPicDisplay" alt="">
                                            <input class="form-control" type="file"  name="idPic" class="" onchange="displayId(this)" id="formIdPic" accept="image/png">
                                            <input  type="hidden" class="form-control" name="idPicNone" id="idPicNone">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="row">
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="inputLastNameClearanceId" class="col-form-label-sm">Last Name</label>
                                                    <input type="text" name="lastName" class="form-control" id="inputLastNameClearanceId"required readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="inputFirstNameClearanceId" class="col-form-label-sm">First Name</label>
                                                    <input type="text" name="firstName" class="form-control" id="inputFirstNameClearanceId"required readonly>
                                                </div>
                                                <div class="col-6  col-md-6 input-group-sm">
                                                    <label for="inputMiddleNameClearanceId" class="col-form-label-sm">Middle Name</label>
                                                    <input type="text" name="middleName" class="form-control" id="inputMiddleNameClearanceId"required readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="inputSuffixClearanceId" class="col-form-label-sm">Suffix</label>
                                                    <input type="text" name="suffix" class="form-control" id="inputSuffixClearanceId"required readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="inputGenderClearanceId" class="col-form-label-sm">Gender</label>
                                                    <input type="text" name="gender" class="form-control" id="inputGenderClearanceId"required readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm ">
                                                    <label for="inputBirthDateClearanceId" class="col-form-label-sm">Birth Date</label>
                                                    <input type="date" name="birthDate" class="form-control" id="inputBirthDateClearanceId"required readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                <label for="inputBirthPlaceClearanceId" class="col-form-label-sm">Birth Place</label>
                                                <input type="text" name="birthPlace" placeholder="City, Province" class="form-control" id="inputBirthPlaceClearanceId"required readonly>
                                                </div>

                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="inputCivilStatusClearanceId" class="col-form-label-sm">Civil Status</label>
                                                    <select id="inputCivilStatusClearanceId" name="civilStatus" class="form-select"required>
                                                    <option value="" selected>None</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-6 col-md-4 input-group-sm">
                                                    <label for="inputAddress" class="col-form-label-sm">Address</label>
                                                    <input type="text" name="address" value="Wasington, Surigao City, SDN" class="form-control" id="inputAddress" readonly>
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm">
                                                    <label for="inputContactNumClearanceId" class="col-form-label-sm">Contact Number</label>
                                                    <input type="text" name="contactNum" class="form-control" id="inputContactNumClearanceId"required>
                                                </div>

                                                <div class="col-12 col-md-4 input-group-sm">
                                                    <label for="inputPermitTo"  class="col-form-label-sm">Permit to</label>
                                                    <select name="permitTo" class="form-select" id="inputPermitTo" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}"required>
                                                        <option></option>
                                                        <option>NEW</option>
                                                        <option>RENEWAL TO OPERATE</option> 
                                                        <option>BUSINESS</option>
                                                        <option>OPERATE TRICYCLE</option>
                                                        <option value="customOption">[OTHERS,SPECIFY]</option>
                                                    </select><input class="form-control" name="permitTo" id="inputPermitTo" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
                                                </div>

                                                <div class="col-12 col-md-4 input-group-sm">
                                                    <label for="inputFormType" class="col-form-label-sm">Type of Certificate</label>
                                                    <input class="form-control" type="text" name="formType"  value="Barangay Clearance-ID" id="inputFormType" readonly>
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm">
                                                    <label for="inputPurpose"  class="col-form-label-sm">Purpose</label>
                                                    <select name="purpose" class="form-select" id="inputPurpose" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}"required>
                                                        <option></option>
                                                        <option>EMPLOYMENT</option>
                                                        <option>BUSINESS</option> 
                                                        <option>STUDENT</option>
                                                        <option value="customOption">[OTHERS,SPECIFY]</option>
                                                    </select><input class="form-control" name="purpose" id="inputPurpose" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm">
                                                    <label for="inputQty"  class="col-form-label-sm">Quantity</label>
                                                    <input type="number" name="qty" class="form-control" id="inputQty"required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


 


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-print"></i>Save</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>