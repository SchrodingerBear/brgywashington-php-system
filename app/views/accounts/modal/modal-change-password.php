<div class="modal fade" id="modalViewAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo URLROOT; ?>/accounts/verified" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="accountId">
                                    <div class="row gy-2">
                                        <div class="col-12 col-md-12 border rounded-2">
                                            <div class="row gx-1 p-2">
                                                <div class="col-6 col-md-4">
                                                    <h5 class="">Details</h5>
                                                </div>
                                                <div class="col-6 col-md-2 text-end my-auto">
                                                    <h6 class="badge bg-info  p-2">Assign as:</h6>
                                                </div>
                                                <div class="col-6 col-md-6 input-group-sm">
                                                    <select id="accountType" name="accountType" class="form-select">
                                                    <option value="0" selected>None</option>
                                                    <option value="2">BHW</option>
                                                    <!-- <option value="1">ADMIN</option> -->
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-9 ">
                                                    <div class="row gx-1">
                                                        <input type="hidden" name="id" id="accountId">
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
                                                        <div class="col-12 col-md-6 input-group-sm mb-1 ">
                                                            <label for="username" class="col-form-label-sm"><i class="fas fa-user"></i>&nbsp;Username</label>
                                                            <input type="text" name="username" class="form-control" id="username" readonly>
                                                        </div>
                                                        <div class="col-12 col-md-6 input-group-sm  ">
                                                            <label for="password" class="col-form-label-sm"><i class="fas fa-key"></i>&nbsp;Create new password</label>
                                                            <input type="text" name="password"  class="form-control">
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
                                        <button type="submit" name="btnSave" class="btn btn-success  rounded-pill">Update</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>