                    <div class="modal fade" id="modalIndigency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/certificates/modalIndigency" method="POST" class="row g-2">
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="inputLastNameIndigency" class="col-form-label-sm">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="inputLastNameIndigency"required readonly>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="inputFirstNameIndigency" class="col-form-label-sm">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="inputFirstNameIndigency"required readonly>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="inputMiddleNameIndigency" class="col-form-label-sm">Middle Name</label>
                                        <input type="text" name="middleName" class="form-control" id="inputMiddleNameIndigency"required readonly>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputSuffixIndigency" class="col-form-label-sm">Suffix</label readonly>
                                        <input type="text" name="suffix" class="form-control" id="inputSuffixIndigency"required readonly>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="inputContactNumIndigency" class="col-form-label-sm">Contact Number</label>
                                        <input type="text" name="contactNum" class="form-control" id="inputContactNumIndigency">
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="inputFormTypeIndigency" class="col-form-label-sm">Type of Certificate</label>
                                        <input class="form-control" type="text" name="formType"  value="Barangay Indigency" id="inputFormTypeIndigency" readonly>
                                    </div>
                                    
                                    <div class="col-6 col-md-4 input-group-sm">
                                        <label for="inputPurposeIndigency"  class="col-form-label-sm">Purpose

                                        </label>
                                        <input type="text" name="purpose" class="form-control" id="inputPurposeIndigency"required>
                                    </div>
                                    <div class="col-6 col-md-2 input-group-sm">
                                        <label for="inputQtyIndigency"  class="col-form-label-sm">Quantity</label>
                                        <input type="text" name="qty" class="form-control" id="inputQtyIndigency"required>
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