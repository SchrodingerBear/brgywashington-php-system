<div class="modal fade" id="modalIndigency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/certificates/modalIndigency" method="POST" class="row g-3">
                                    <div class="col-md-6 input-group-sm">
                                        <label for="inputLastName" class="col-form-label-sm">Last Name</label>
                                        <input type="text" name="lastName" value="<?php echo $data['certificate']->last_name ?>" class="form-control" id="inputLastName">
                                    </div>
                                    <div class="col-md-6 input-group-sm">
                                        <label for="inputFirstName" class="col-form-label-sm">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="inputFirstName">
                                    </div>
                                    <div class="col-12 col-md-6 input-group-sm">
                                        <label for="inputMiddleName" class="col-form-label-sm">Middle Name</label>
                                        <input type="text" name="middleName" class="form-control" id="inputMiddleName">
                                    </div>
                                    <div class="col-md-3 input-group-sm">
                                        <label for="inputSuffix" class="col-form-label-sm">Suffix</label>
                                        <select id="inputSuffix" name="suffix" class="form-select">
                                        <option value="" selected>None</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 input-group-sm">
                                        <label for="inputContactNum" class="col-form-label-sm">Contact Number</label>
                                        <input type="text" name="contactNum" class="form-control" id="inputContactNum">
                                    </div>
                                    <div class="col-md-6 input-group-sm">
                                        <label for="inputFormType" class="col-form-label-sm">Type of Certificate</label>
                                        <input class="form-control" type="text" name="formType"  value="Barangay Indigency" id="inputFormType" readonly>
                                    </div>
                                    
                                    <div class="col-md-4 input-group-sm">
                                        <label for="inputPurpose"  class="col-form-label-sm">Purpose

                                        </label>
                                        <input type="text" name="purpose" class="form-control" id="inputPurpose">
                                    </div>
                                    <div class="col-md-2 input-group-sm">
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