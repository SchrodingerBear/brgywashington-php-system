<div class="modal fade" id="modalResidency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/users/resubmit_residency" method="POST" class="row gx-3">
                                    <input type="hidden" name="id" id="residencyId">
                                    <input type="hidden" name="control" id="residencyControl">
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyLastName" class="col-form-label-sm">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="residencyLastName" readonly>
                                    </div>
                                    <div class="col-6  col-md-3 input-group-sm">
                                        <label for="residencyFirstName" class="col-form-label-sm">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="residencyFirstName" readonly>
                                    </div>
                                    <div class="col-6  col-md-3 input-group-sm">
                                        <label for="residencyMiddleName" class="col-form-label-sm">Middle Name</label>
                                        <input type="text" name="middleName" class="form-control" id="residencyMiddleName" readonly>
                                    </div>
                                    <div class="col-6  col-md-3 input-group-sm">
                                        <label for="residencySuffix" class="col-form-label-sm">Suffix</label>
                                        <input type="text" name="suffix" class="form-control" id="residencySuffix" readonly>

                                    </div>

                                    <div class="col-6  col-md-3 input-group-sm">
                                        <label for="residencyGender" class="col-form-label-sm">Gender</label>
                                        <input type="text" name="gender" class="form-control" id="residencyGender" readonly>

                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm ">
                                    <label for="residencyBirthDate" class="col-form-label-sm">Birth Date</label>
                                    <input type="date" name="birthDate" class="form-control" id="residencyBirthDate" readonly>
                                    </div>

                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyBirthPlace" class="col-form-label-sm">Birth Place</label>
                                        <input type="text" name="birthPlace" class="form-control" id="residencyBirthPlace" readonly>
                                    </div>

                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyContactNum" class="col-form-label-sm">Contact Number</label>
                                        <input type="text" name="contactNum" class="form-control" id="residencyContactNum">
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                    <label for="residencyFaLastName" class="col-form-label-sm">Father's Last Name</label>
                                        <input type="text" name="faLastName" class="form-control" id="residencyFaLastName">
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyFaFirstName" class="col-form-label-sm">Father's First Name</label>
                                        <input type="text" name="faFirstName" class="form-control" id="residencyFaFirstName">
                                    </div>
                                    <div class="col-6  col-md-3 input-group-sm">
                                        <label for="residencyFaMiddleName" class="col-form-label-sm">Father's Middle Name</label>
                                        <input type="text" name="faMiddleName" class="form-control" id="residencyFaMiddleName">
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyFaSuffix" class="col-form-label-sm">Father's Suffix</label>
                                        <select id="residencyFaSuffix" name="faSuffix" class="form-select">
                                        <option value="" selected>None</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                    <label for="residencyMoMaidenName" class="col-form-label-sm">Mother's Maiden Name</label>
                                        <input type="text" name="moMaidenName" class="form-control" id="residencyMoMaidenName">
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyMoFirstName" class="col-form-label-sm">Mother's First Name</label>
                                        <input type="text" name="moFirstName" class="form-control" id="residencyMoFirstName">
                                    </div>
                                    <div class="col-6  col-md-3 input-group-sm">
                                        <label for="residencyMoMiddleName" class="col-form-label-sm">Mother's Middle Name</label>
                                        <input type="text" name="moMiddleName" class="form-control" id="residencyMoMiddleName">
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyMoSuffix" class="col-form-label-sm">Mother's Suffix</label>
                                        <select id="residencyMoSuffix" name="moSuffix" class="form-select">
                                        <option value="" selected>None</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        </select>
                                    </div>        
                                    <div class="col-12 col-md-6 input-group-sm">
                                        <label for="residencyFormType" class="col-form-label-sm">Type of Certificate</label>
                                        <input class="form-control" type="text" name="formType"  value="Barangay Residency" id="residencyFormType" readonly>
                                    </div>
                                    
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyPurpose"  class="col-form-label-sm">Purpose

                                        </label>
                                        <input type="text" name="purpose" class="form-control" id="residencyPurpose">
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="residencyQty"  class="col-form-label-sm">Quantity</label>
                                        <input type="text" name="qty" class="form-control" id="residencyQty">
                                    </div>


                            </div>
                            <div class="modal-footer text-center">
                                <div class="mb-3 col-12 col-md-12 input-group-sm">
                                            <label for="residencyFeedback" class="col-form-label-sm">Response Message</label>
                                            <textarea class="form-control" name="feedback" id="residencyFeedback" rows="3" readonly></textarea>
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