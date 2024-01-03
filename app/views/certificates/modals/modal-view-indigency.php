<div class="modal fade" id="modalIndigency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/certificates/req_status" method="POST" class="row gx-3">
                                    <input type="hidden" name="id" id="indigencyId">
                                    <input type="hidden" name="control" id="indigencyControl">
                                    <div class="col-6 col-md-6 input-group-sm border border-1">
                                        <label for="indigencyLastName" class="col-form-label-sm">Last Name</label>
                                        <h6  id="indigencyLastName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm border border-1">
                                        <label for="indigencyFirstName" class="col-form-label-sm">First Name</label>
                                        <h6  id="indigencyFirstName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm border border-1">
                                        <label for="indigencyMiddleName" class="col-form-label-sm">Middle Name</label>
                                        <h6  id="indigencyMiddleName">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm border border-1">
                                        <label for="indigencySuffix" class="col-form-label-sm">Suffix</label>
                                        <h6  id="indigencySuffix">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm border border-1">
                                        <label for="indigencyContactNum" class="col-form-label-sm">Contact Number</label>
                                        <h6  id="indigencyContactNum">&nbsp;</h6>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm border border-1">
                                        <label for="indigencyFormType" class="col-form-label-sm">Type of Certificate</label>
                                        <h6  id="indigencyFormType">&nbsp;</h6>
                                        <input type="hidden" id="indigencyFormTypeValue" name="formType">
                                    </div>
                                    
                                    <div class="col-6 col-md-6 input-group-sm border border-1">
                                        <label for="indigencyPurpose"  class="col-form-label-sm">Purpose</label>
                                        <h6  id="indigencyPurpose">&nbsp;</h6>
                                    </div>

                                    <div class="col-6 col-md-6 input-group-sm border border-1">
                                        <label for="indigencyQty"  class="col-form-label-sm">Quantity</label>
                                        <h6  id="indigencyQty">&nbsp;</h6>
                                    </div>


                            </div>
                            <div class="modal-footer text-center">
                                <div class="mb-3 col-12 col-md-12 input-group-sm">
                                            <label for="indigencyFeedback" class="col-form-label-sm">Response Message</label>
                                            <textarea class="form-control" name="feedback" id="indigencyFeedback" rows="3"></textarea>
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