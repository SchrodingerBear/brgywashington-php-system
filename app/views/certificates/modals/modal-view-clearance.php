<div class="modal fade" id="modalClearance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/certificates/req_status" method="POST">
                                    <input type="hidden" name="id" id="clearanceId">
                                    <input type="hidden" name="control" id="clearanceControl">
                                    <div class="row gx-2">
                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                            <label for="clearanceLastName" class="col-form-label-sm">Last Name</label>
                                            <h6  id="clearanceLastName">&nbsp;</h6>
                                        </div>
                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                            <label for="clearanceFirstName" class="col-form-label-sm">First Name</label>
                                            <h6  id="clearanceFirstName">&nbsp;</h6>
                                        </div>
                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                            <label for="clearanceMiddleName" class="col-form-label-sm">Middle Name</label>
                                            <h6  id="clearanceMiddleName">&nbsp;</h6>
                                        </div>
                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                            <label for="clearanceSuffix" class="col-form-label-sm">Suffix</label>
                                            <h6  id="clearanceSuffix">&nbsp;</h6>
                                        </div>
                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                            <label for="clearanceContactNum" class="col-form-label-sm">Contact Number</label>
                                            <h6  id="clearanceContactNum">&nbsp;</h6>
                                        </div>
                                        
                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                            <label for="clearanceFormType" class="col-form-label-sm">Type of Certificate</label>
                                            <h6  id="clearanceFormType">&nbsp;</h6>
                                            <input type="hidden" id="clearanceFormTypeValue" name="formType">
                                        </div>

                                        <div class="col-12 col-md-6 input-group-sm border border-1">
                                            <label for="clearancePermitToView"  class="col-form-label-sm">Permit to</label>
                                            <h6  id="clearancePermitToView">&nbsp;</h6>
                                        </div>

                                        
                                        <div class="col-6 col-md-4 input-group-sm border border-1">
                                            <label for="clearancePurposeView"  class="col-form-label-sm">Purpose</label>
                                            <h6  id="clearancePurposeView">&nbsp;</h6>
                                        </div>

                                        <div class="col-6 col-md-2 input-group-sm border border-1">
                                            <label for="clearanceQty"  class="col-form-label-sm">Quantity</label>
                                            <h6  id="clearanceQty">&nbsp;</h6>
                                        </div>
                                    </div>


                            </div>
                            <div class="modal-footer text-center">
                                <div class="mb-3 col-12 col-md-12 input-group-sm">
                                            <label for="clearanceFeedback" class="col-form-label-sm">Response Message</label>
                                            <textarea class="form-control" name="feedback" id="clearanceFeedback" rows="3"></textarea>
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