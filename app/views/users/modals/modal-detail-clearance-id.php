<div class="modal fade" id="modalClearanceId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo URLROOT; ?>/users/resubmit_clearance_id" method="POST" enctype="multipart/form-data" class="g-3">
                                    <input type="hidden" name="id" id="clearanceIdId">
                                    <input type="hidden" name="control" id="clearanceIdControl">
                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <img src="<?php echo URLROOT .'/img/img-placeholder.jpg'?>"  class="img-thumbnail" onclick="clearancetriggerClick()" id="idPicDisplay" alt="" >
                                            <input class="form-control" type="file"  name="idPic" onchange="displayId(this)" id="formIdPic">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="row">
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="clearanceIdLastName" class="col-form-label-sm">Last Name</label>
                                                    <input type="text" name="lastName" class="form-control" id="clearanceIdLastName" readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="clearanceIdFirstName" class="col-form-label-sm">First Name</label>
                                                    <input type="text" name="firstName" class="form-control" id="clearanceIdFirstName" readonly>
                                                </div>
                                                <div class="col-6  col-md-6 input-group-sm">
                                                    <label for="clearanceIdMiddleName" class="col-form-label-sm">Middle Name</label>
                                                    <input type="text" name="middleName" class="form-control" id="clearanceIdMiddleName" readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="clearanceIdSuffix" class="col-form-label-sm">Suffix</label>
                                                    <input type="text" name="suffix" class="form-control" id="clearanceIdSuffix" readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="clearanceIdGender" class="col-form-label-sm">Gender</label>
                                                    <input type="text" name="gender" class="form-control" id="clearanceIdGender" readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm ">
                                                    <label for="clearanceIdBirthDate" class="col-form-label-sm">Birth Date</label>
                                                    <input type="date" name="birthDate" class="form-control" id="clearanceIdBirthDate" readonly>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                <label for="clearanceIdBirthPlace" class="col-form-label-sm">Birth Place</label>
                                                <input type="text" name="birthPlace" placeholder="City, Province" class="form-control" id="clearanceIdBirthPlace" readonly>
                                                </div>

                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <label for="clearanceIdCivilStatus" class="col-form-label-sm">Civil Status</label>
                                                    <select id="clearanceIdCivilStatus" name="civilStatus" class="form-select">
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
                                                    <label for="clearanceIdAddress" class="col-form-label-sm">Address</label>
                                                    <input type="text" name="address" value="Lucero, Bolinao Pang." class="form-control" id="clearanceIdAddress" readonly>
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm">
                                                    <label for="clearanceIdContactNum" class="col-form-label-sm">Contact Number</label>
                                                    <input type="text" name="contactNum" class="form-control" id="clearanceIdContactNum">
                                                </div>

                                                <div class="col-12 col-md-4 input-group-sm">
                                                    <label for="clearanceIdPermitTo"  class="col-form-label-sm">Permit to</label>
                                                    <select name="permitTo" class="form-select" id="clearanceIdPermitTo" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
                                                        <option></option>
                                                        <option>NEW</option>
                                                        <option>RENEWAL TO OPERATE</option> 
                                                        <option>BUSINESS</option>
                                                        <option>OPERATE TRICYCLE</option>
                                                        <option value="customOption">[OTHERS,SPECIFY]</option>
                                                    </select><input class="form-control" name="permitTo" id="clearanceIdPermitTo" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
                                                </div>

                                                <div class="col-12 col-md-4 input-group-sm">
                                                    <label for="clearanceIdFormType" class="col-form-label-sm">Type of Certificate</label>
                                                    <input class="form-control" type="text" name="formType"  value="Barangay Clearance-ID" id="clearanceIdFormType" readonly>
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm">
                                                    <label for="clearanceIdPurpose"  class="col-form-label-sm">Purpose</label>
                                                    <select name="purpose" class="form-select" id="clearanceIdPurpose" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
                                                        <option></option>
                                                        <option>EMPLOYMENT</option>
                                                        <option>BUSINESS</option> 
                                                        <option>STUDENT</option>
                                                        <option value="customOption">[OTHERS,SPECIFY]</option>
                                                    </select><input class="form-control" name="purpose" id="clearanceIdPurpose" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm">
                                                    <label for="clearnaceIdQty"  class="col-form-label-sm">Quantity</label>
                                                    <input type="number" name="qty" class="form-control" id="clearanceIdQty">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            </div>
                            <div class="modal-footer text-center">
                                <div class="mb-3 col-12 col-md-12 input-group-sm">
                                            <label for="clearanceIdFeedback" class="col-form-label-sm">Response Message</label>
                                            <textarea class="form-control" name="feedback" id="clearanceIdFeedback" rows="3" readonly></textarea>
                                        </div>
                                        <div class="col-12  col-md-12 row ">
                                    <div class="offset-1 col-5  offset-md-2 col-md-4 d-grid gap-2 text-center">
                                        <button type="submit" name="btnUpdate" class="btn btn-success">Re: Submit</button>
                                    </div>
                                    <div class="col-5 col-md-4 d-grid gap- text-center">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Back</button>
                                    </div>
                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>