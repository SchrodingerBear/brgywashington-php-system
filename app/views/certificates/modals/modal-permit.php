<div class="modal fade" id="modalPermit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/certificates/modalPermit" method="POST" class="row g-2">
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputLastNamePermit" class="col-form-label-sm">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="inputLastNamePermit"required readonly>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputFirstNamePermit" class="col-form-label-sm">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="inputFirstNamePermit"required readonly>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputMiddleNamePermit" class="col-form-label-sm">Middle Name</label>
                                        <input type="text" name="middleName" class="form-control" id="inputMiddleNamePermit"required readonly>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputSuffixPermit" class="col-form-label-sm">Suffix</label>
                                        <input type="text" name="middleName" class="form-control" id="inputSuffixPermit"required readonly>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputContactNumPermit" class="col-form-label-sm">Contact Number</label>
                                        <input type="text" name="contactNum" class="form-control" id="inputContactNumPermit">
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputFormType" class="col-form-label-sm">Type of Certificate</label>
                                        <input class="form-control" type="text" name="formType"  value="Barangay Permit" id="inputFormType" readonly>
                                    </div>
                                    <div class="col-12 col-md-12 input-group-sm">
                                        <label for="inputPurpose"  class="col-form-label-sm">Name Of Business

                                        </label>
                                        <input type="text" name="businessName" class="form-control" id="inputPurpose"required>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputOperLastName" class="col-form-label-sm">Operator Last Name</label>
                                        <input type="text" class="form-control" name="operLastName" id="inputOperLastName"required>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputOperFirstName" class="col-form-label-sm">Operator First Name</label>
                                        <input type="text" class="form-control" name="operFirstName" id="inputOperFirstName"required>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputMiddleName" class="col-form-label-sm">Operator Middle Name</label>
                                        <input type="text" class="form-control" name="operMiddleName" id="inputMiddleName"required>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputSuffix" class="col-form-label-sm">Suffix</label>
                                        <select id="inputSuffix" name="operSuffix" class="form-select">
                                        <option selected>None</option>
                                        <option>Jr.</option>
                                        <option>Sr.</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputPurpose"  class="col-form-label-sm">Purpose

                                        </label>
                                        <input type="text" name="purpose" class="form-control" id="inputPurpose"required>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputQty"  class="col-form-label-sm">Quantity</label>
                                        <input type="text" name="qty" class="form-control" id="inputQty"required>
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