<div class="modal fade" id="modalEditOfficial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/admins/brgy_official" method="POST" class="row g-2">
                                    <input type="hidden" name="id" id="id">
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="fullname" class="col-form-label-sm">Fullname</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname"required>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="committee" class="col-form-label-sm">Committee</label>
                                        <select id="committee" name="committee" class="form-select">
                                        <option value="" selected>None</option>
                                        <option value="Committee on Education and Healthcare">Committee on Education and Healthcare</option>
                                        <option value="Committee on Peace and Order/Badac">Committee on Peace and Order/Badac</option>
                                        <option value="Committee on Sport and Recreation">Committee on Sport and Recreation</option>
                                        <option value="Committee on Budget and Appropriation">Committee on Budget and Appropriation</option>
                                        <option value="Committee on Environment">Committee on Environment</option>
                                        <option value="Committee on Agriculture and Fishery">Committee on Agriculture and Fishery</option>
                                        <option value="Committee on Women and Children Protection">Committee on Women and Children Protection</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="position" class="col-form-label-sm">Position</label>
                                        <input type="text" name="position" class="form-control" id="position"readonly>
                                    </div>

                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="contactNumber" class="col-form-label-sm">Contact Number</label>
                                        <input type="text" name="contactNum" class="form-control" id="contactNumber">
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