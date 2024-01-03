<div class="modal fade" id="modalPermit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/certificates/req_status" method="POST" class="row gx-3">
                                    <input type="hidden" name="id" id="permitId">
                                    <input type="hidden" name="control" id="permitControl">
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitLastName" class="col-form-label-sm">Last Name</label>
                                        <h6  id="permitLastName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitFirstName" class="col-form-label-sm">First Name</label>
                                        <h6  id="permitFirstName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitMiddleName" class="col-form-label-sm">Middle Name</label>
                                        <h6  id="permitMiddleName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitSuffix" class="col-form-label-sm">Suffix</label>
                                        <h6  id="permitSuffix">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitContactNum" class="col-form-label-sm">Contact Number</label>
                                        <h6  id="permitContactNum">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitFormType" class="col-form-label-sm">Type of Certificate</label>
                                        <h6  id="permitFormType">&nbsp;</h6>
                                        <input type="hidden" id="permitFormTypeValue" name="formType">
                                    </div>
                                    <div class="col-12 col-md-12 input-group-sm border border-1">
                                        <label for="permitBusinessName" class="col-form-label-sm">Name of Business</label>
                                        <h6  id="permitBusinessName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitOperLastName" class="col-form-label-sm">Operator Last Name</label>
                                        <h6  id="permitOperLastName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitOperFirstName" class="col-form-label-sm">Operator First Name</label>
                                        <h6  id="permitOperFirstName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitOperMiddleName" class="col-form-label-sm">Operator Middle Name</label>
                                        <h6  id="permitOperMiddleName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitOperSuffixView" class="col-form-label-sm">Operator Suffix</label>
                                        <h6  id="permitOperSuffixView">&nbsp;</h6>
                                    </div>

                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitPurpose"  class="col-form-label-sm">Purpose</label>
                                        <h6  id="permitPurpose">&nbsp;</h6>
                                    </div>

                                    <div class="col-6 col-md-4 input-group-sm border border-1">
                                        <label for="permitQty"  class="col-form-label-sm">Quantity</label>
                                        <h6  id="permitQty">&nbsp;</h6>
                                    </div>


                            </div>
                            <div class="modal-footer text-center">
                                <div class="mb-3 col-12 col-md-12 input-group-sm">
                                            <label for="permitFeedback" class="col-form-label-sm">Response Message</label>
                                            <textarea class="form-control" name="feedback" id="permitFeedback" rows="3"></textarea>
                                        </div>
                                    <div class="col-12  col-md-12 text-center">
                                        <button type="submit" name="btnApprove" class="btn btn-success rounded-pill">Approve&nbsp;<i class="fas fa-check"></i></button>
                                        <button type="submit" name="btnDisapprove" class="btn btn-danger rounded-pill">Disapprove&nbsp;<i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
</div>