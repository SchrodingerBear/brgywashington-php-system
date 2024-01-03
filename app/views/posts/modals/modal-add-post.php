<div class="modal fade" id="modalAddPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Posts</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body overflow-hidden">
                                <form action="<?php echo URLROOT; ?>/posts/modalAddPost" method="POST" enctype="multipart/form-data">
                                    <div class="row g-4 ">

                                        <div class="col-sm-12 col-md-12 col-lg-2">
                                            <div class="row g-2  p-3 border border-2 rounded-3">
                                                <h6>BRGY <?php echo htmlspecialchars($brgy_name); ?></h6>
                                                <div class="d-grid gap-2 col-12 mx-auto ">
                                                    <img src="<?php echo URLROOT . '/' . htmlspecialchars($logo) . '?v=' . time(); ?>" class="img-thumbnail align-center" alt="">
                                                </div>
                                                <div class="col col-md-12">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-10 ">
                                            <div class="row g-2  p-3 border border-2 rounded-3">
                                                <h6>POST DETAILS</h6>
                                                <div class="col-6 col-md-12 input-group-sm">
                                                    <label for="inputTitle" class="col-form-label-sm">Title</label>
                                                    <input type="text-area" name="title" class="form-control" id="inputTitle"required>
                                                </div>
                                                <div class="col-6 col-md-12 input-group-sm">
                                                    <label for="inputBody" class="col-form-label-sm">Description</label>
                                                    <textarea rows="4" name="body" class="form-control" id="inputBody" required></textarea>
                                                </div>

                                            </div>

            
                                            
                                        </div>


                                        <div class="col-sm-12 col-md-12 col-lg-4">

   
                                        </div>



                                    </div>


 


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success add_success"><i class="fas fa-print"></i>Post</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>