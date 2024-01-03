<div class="modal fade" id="modalResidency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo URLROOT; ?>/certificates/modalResidency" method="POST" class="row g-3">
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputLastNameResidency" class="col-form-label-sm">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="inputLastNameResidency"required readonly>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputFirstNameResidency" class="col-form-label-sm">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="inputFirstNameResidency"required readonly>
                                    </div>
                                    <div class="col-6  col-md-3 input-group-sm">
                                        <label for="inputMiddleNameResidency" class="col-form-label-sm">Middle Name</label>
                                        <input type="text" name="middleName" class="form-control" id="inputMiddleNameResidency"required readonly>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputSuffixResidency" class="col-form-label-sm">Suffix</label>
                                        <input type="text" name="suffix" class="form-control" id="inputSuffixResidency"required readonly>
                                    </div>

                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputGenderResidency" class="col-form-label-sm">Gender</label>
                                        <input type="text" name="gender" class="form-control" id="inputGenderResidency"required readonly>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm ">
                                    <label for="inputBirthDateResidency" class="col-form-label-sm">Birth Date</label>
                                    <input type="date" name="birthDate" class="form-control" id="inputBirthDateResidency"required readonly>
                                    </div>

                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputBirthPlaceResidency" class="col-form-label-sm">Birth Place</label>
                                        <input type="text" name="birthPlace" class="form-control" id="inputBirthPlaceResidency"required readonly>
                                    </div>

                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputContactNumResidency" class="col-form-label-sm">Contact Number</label>
                                        <input type="text" name="contactNum" class="form-control" id="inputContactNumResidency"required>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                    <label for="inputLastName" class="col-form-label-sm">Father's Last Name</label>
                                        <input type="text" name="faLastName" class="form-control" id="inputLastName"required>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputFirstName" class="col-form-label-sm">Father's First Name</label>
                                        <input type="text" name="faFirstName" class="form-control" id="inputFirstName"required>
                                    </div>
                                    <div class="col-6  col-md-3 input-group-sm">
                                        <label for="inputMiddleName" class="col-form-label-sm">Father's Middle Name</label>
                                        <input type="text" name="faMiddleName" class="form-control" id="inputMiddleName"required>
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
                                    <label for="inputLastName" class="col-form-label-sm">Mother's Maiden Name</label>
                                        <input type="text" name="moMaidenName" class="form-control" id="inputLastName"required>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputFirstName" class="col-form-label-sm">Mother's First Name</label>
                                        <input type="text" name="moFirstName" class="form-control" id="inputFirstName"required>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputMiddleName" class="col-form-label-sm">Mother's Middle Name</label>
                                        <input type="text" name="moMiddleName" class="form-control" id="inputMiddleName"required>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputSuffix" class="col-form-label-sm">Mother's Suffix</label>
                                        <select id="inputSuffix" name="moSuffix" class="form-select">
                                        <option value="" selected>None</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        </select>
                                    </div>        
                                    <div class="col-12 col-md-4 input-group-sm">
                                        <label for="inputFormType" class="col-form-label-sm">Type of Certificate</label>
                                        <input class="form-control" type="text" name="formType"  value="Barangay Residency" id="inputFormType" readonly>
                                    </div>
                                    
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputPurpose"  class="col-form-label-sm">Purpose</label>
                                        <input type="text" name="purpose" class="form-control" id="inputPurpose"required>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputQty"  class="col-form-label-sm">Quantity</label>
                                        <input type="text" name="qty" class="form-control" id="inputQty">
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