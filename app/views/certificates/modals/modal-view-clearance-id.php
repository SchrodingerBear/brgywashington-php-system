<div class="modal fade" id="modalClearanceId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo URLROOT; ?>/certificates/req_status" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="clearanceIdId">
                                    <input type="hidden" name="control" id="clearanceIdControl">
                                    <div class="row">
                                        <div class="col-6 col-md-4 ">
                                                <img src="<?php echo URLROOT .'/img/img-placeholder.jpg'?>" class="img-thumbnail " onclick="clearancetriggerClick()" id="idPicDisplay" alt="">
                                                <input class="form-control" type="file"  name="idPic" onchange="displayId(this)" id="formIdPic" accept="image/png">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="row">
                                                <div class="col-6 col-md-6 input-group-sm border border-1">
                                                    <label for="clearanceIdLastName" class="col-form-label-sm">Last Name</label>
                                                    <h6  id="clearanceIdLastName">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm border border-1">
                                                    <label for="clearanceIdFirstName" class="col-form-label-sm">First Name</label>
                                                    <h6  id="clearanceIdFirstName">&nbsp;</h6>
                                                </div>
                                                <div class="col-6  col-md-6 input-group-sm border border-1">
                                                    <label for="clearanceIdMiddleName" class="col-form-label-sm">Middle Name</label>
                                                    <h6  id="clearanceIdMiddleName">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm border border-1">
                                                    <label for="clearanceIdSuffix" class="col-form-label-sm">Suffix</label>
                                                    <h6  id="clearanceIdSuffix">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm border border-1">
                                                    <label for="clearanceIdGender" class="col-form-label-sm">Gender</label>
                                                    <h6  id="clearanceIdGender">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm  border border-1">
                                                    <label for="clearanceIdBirthDate" class="col-form-label-sm">Birth Date</label>
                                                    <h6  id="clearanceIdBirthDate">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm border border-1">
                                                <label for="clearanceIdBirthPlace" class="col-form-label-sm">Birth Place</label>
                                                <h6  id="clearanceIdBirthPlace">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-6 input-group-sm border border-1">
                                                    <label for="clearanceIdCivilStatusView" class="col-form-label-sm">Civil Status</label>
                                                    <h6  id="clearanceIdCivilStatusView">&nbsp;</h6>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-6 col-md-4 input-group-sm border border-1">
                                                    <label for="clearanceIdAddress" class="col-form-label-sm">Address</label>
                                                    <h6  id="clearanceIdAddress">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm border border-1">
                                                    <label for="clearanceIdContactNum" class="col-form-label-sm">Contact Number</label>
                                                    <h6  id="clearanceIdContactNum">&nbsp;</h6>
                                                </div>

                                                <div class="col-12 col-md-4 input-group-sm border border-1">
                                                    <label for="clearanceIdPermitToView"  class="col-form-label-sm">Permit to</label>
                                                    <h6  id="clearanceIdPermitToView">&nbsp;</h6>

                                                </div>

                                                <div class="col-12 col-md-4 input-group-sm border border-1">
                                                    <label for="clearanceIdFormType" class="col-form-label-sm">Type of Certificate</label>
                                                    <h6  id="clearanceIdFormType">&nbsp;</h6>
                                                    <input type="hidden" id="clearanceIdFormTypeValue" name="formType">
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm border border-1">
                                                    <label for="clearanceIdPurposeView"  class="col-form-label-sm">Purpose</label>
                                                    <h6  id="clearanceIdPurposeView">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-4 input-group-sm border border-1">
                                                    <label for="clearanceIdQty"  class="col-form-label-sm">Quantity</label>
                                                    <h6  id="clearanceIdQty">&nbsp;</h6>
                                                </div>
                                            </div>


                            </div>
                            <div class="modal-footer text-center">
                                <div class="mb-3 col-12 col-md-12 input-group-sm">
                                            <label for="clearanceIdFeedback" class="col-form-label-sm">Response Message</label>
                                            <textarea class="form-control" name="feedback" id="clearanceIdFeedback" rows="3"></textarea>
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
