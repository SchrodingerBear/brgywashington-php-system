<div class="modal fade" id="modalClearance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/certificates/modalClearance" method="POST">
                                    <div class="row gx-2">
                                        <div class="col-6 col-md-6 input-group-sm">
                                            <label for="inputLastNameClearance" class="col-form-label-sm">Last Name</label>
                                            <input type="text" name="lastName" class="form-control" id="inputLastNameClearance"required readonly>
                                        </div>
                                        <div class="col-6 col-md-6 input-group-sm">
                                            <label for="inputFirstNameClearance" class="col-form-label-sm">First Name</label>
                                            <input type="text" name="firstName" class="form-control" id="inputFirstNameClearance"required readonly>
                                        </div>
                                        <div class="col-6 col-md-6 input-group-sm">
                                            <label for="inputMiddleNameClearance" class="col-form-label-sm">Middle Name</label>
                                            <input type="text" name="middleName" class="form-control" id="inputMiddleNameClearance"required readonly>
                                        </div>
                                        <div class="col-6 col-md-6 input-group-sm">
                                            <label for="inputSuffixClearance" class="col-form-label-sm">Suffix</label>
                                            <input type="text" name="suffix" class="form-control" id="inputSuffixClearance"required readonly>
                                        </div>
                                        <div class="col-6 col-md-6 input-group-sm">
                                            <label for="inputContactNumClearance" class="col-form-label-sm">Contact Number</label>
                                            <input type="text" name="contactNum" class="form-control" id="inputContactNumClearance"required>
                                        </div>

                                        <div class="col-6 col-md-6 input-group-sm">
                                            <label for="inputFormType" class="col-form-label-sm">Type of Certificate</label>
                                            <input class="form-control" type="text" name="formType"  value="Barangay Clearance" id="inputFormType" readonly>
                                        </div>

                                        <div class="col-12 col-md-6 input-group-sm">
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

                                        <div class="col-6 col-md-2 input-group-sm">
                                            <label for="inputQty"  class="col-form-label-sm">Quantity</label>
                                            <input type="text" name="qty" class="form-control" id="inputQty"required>
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