<div class="modal fade" id="modalVerify" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" style="padding: 15px;">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Edit details</h5>


                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>
                            <div class="modal-body">


                            <form action="<?php echo URLROOT; ?>/users/requestVerifyAccount" method="POST" enctype="multipart/form-data">
                                <div class="row g-3">

                                    <h6>Upload any supporting document:</h6> 
                                    <span>Any valid Id, Birth Certificate, Marriage Contract, Business Permit</span>

                                    <div class="offset-1 col-10 ">
                                    <img src="<?php echo URLROOT .'/img/placeholder-id.png'?>" class="img-thumbnail" onclick="frontIdTriggerClick()" id="frontIdDisplay" alt="">
                                    <label for="frontId" class="form-label btn btn-secondary btn-sm rounded-pill d-flex justify-content-center"><i class="fas fa-folder-open"></i>&nbsp;Upload</label>
                                    <input class="form-control" type="file"  name="frontId" onchange="displayFrontId(this)" id="frontId" accept="image/*">
                                    </div>
 

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-success rounded-pill " type="submit"><h6 class="my-auto">Submit</h6></button>
                                    </div>
                                </div>
                            </form>   

                            </div>

                            </div>
                        </div>
                    </div>