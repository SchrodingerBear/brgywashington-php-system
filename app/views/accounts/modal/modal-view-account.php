<div class="modal fade" id="modalViewAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Verify Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo URLROOT; ?>/accounts/index" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="accountId">
                                    <div class="row g-2">
                                        <div class="col-12 col-md-12 d-flex justify-content-center">
                                                <img src="<?php echo URLROOT .'/img/img-placeholder.jpg'?>" id="docStatus" class="img-thumbnail" alt="">
                                        </div>
                                        <div class="col-12 col-md-12 border rounded-2">
                                        <h5 class="mt-2 border-bottom">Details</h5>
                                            <div class="row">
                                                <div class="col-md-9 ">
                                                    <div class="row gx-1">
                                                        <div class="col-12 col-md-6 input-group-sm border border-1">
                                                            <label for="lastName" class="col-form-label-sm">Last Name</label>
                                                            <h6  id="lastName">&nbsp;</h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 input-group-sm  border border-1">
                                                            <label for="firstName" class="col-form-label-sm">First Name</label>
                                                            <h6  id="firstName">&nbsp;</h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 input-group-sm  border border-1">
                                                            <label for="middleName" class="col-form-label-sm">Middle Name</label>
                                                            <h6  id="middleName">&nbsp;</h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 input-group-sm  border border-1">
                                                            <label for="suffix" class="col-form-label-sm">Suffix</label>
                                                            <h6  id="suffix">&nbsp;</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-flex align-items-center">
                                                    <img src="<?php echo URLROOT .'/img/id/resident/placeholder.png'?>" id="profilePicAccount" class="img-thumbnail" alt="">
                                                </div>
                                               

                                            </div>


                                        </div>
                                        <div class="col-md-12">



                            </div>
                            <div class="modal-footer text-center">
                                <!-- <div class="mb-3 col-12 col-md-12 input-group-sm">
                                            <label for="accountStatus" class="col-form-label-sm">Response Message</label>
                                            <textarea class="form-control" name="accountStatus" id="accountStatus" rows="3"></textarea>
                                        </div> -->
                                    <div class="col-12  col-md-12 text-center">
                                        <button type="submit" name="btnApprove" class="btn btn-primary rounded-pill">Accept&nbsp;<i class="fas fa-check"></i></button>
                                        <button type="submit" name="btnDisapprove" class="btn btn-danger rounded-pill">Reject&nbsp;<i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>