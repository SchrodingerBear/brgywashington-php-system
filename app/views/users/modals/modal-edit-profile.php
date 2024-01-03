<div class="modal fade" id="modalProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" style="padding: 15px;">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Edit details</h5>


                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>
                            <div class="modal-body">


                            <form action="<?php echo URLROOT; ?>/users/profile" method="POST" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <input type="hidden" name="id" id="profileId"> 
                                    <div class="offset-3 col-6">
                                    <img src="<?php echo URLROOT .'/img/resident/placeholder.png'?>" class="img-thumbnail rounded-circle" onclick="profileTriggerClick()" id="profileDisplay" alt="">
                                    <!-- <label for="profile" class="form-label btn btn-secondary btn-sm rounded-pill ">Change&nbsp;<i class="fas fa-camera-retro"></i></label> -->
                                    <input class="form-control " type="file"  name="changeProfile" onchange="displayProfile(this)" id="profile">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" name="username" id="profileUsername" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                    </div>
                                    <!-- <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" name="email" id="profileEmail" aria-label="Email" aria-describedby="basic-addon2">
                                    </div> -->

      



                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-success rounded-pill " type="submit"><h6 class="my-auto">Save changes</h6></button>
                                    </div>
                                </div>
                            </form>   

                            </div>

                            </div>
                        </div>
                    </div>