<div class="modal fade" id="modalIndigency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo URLROOT; ?>/users/resubmit_indigency" method="POST" class="row gx-3">
                                    <input type="hidden" name="id" id="indigencyId">
                                    <input type="hidden" name="control" id="indigencyControl">
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="indigencyLastName" class="col-form-label-sm">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="indigencyLastName" readonly>
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="indigencyFirstName" class="col-form-label-sm">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="indigencyFirstName"readonly >
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="indigencyMiddleName" class="col-form-label-sm">Middle Name</label>
                                        <input type="text" name="middleName" class="form-control" id="indigencyMiddleName"readonly>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="indigencySuffix" class="col-form-label-sm">Suffix</label>
                                        <input type="text" name="suffix" class="form-control" id="indigencySuffix"readonly>
                                    </div>
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="indigencyContactNum" class="col-form-label-sm">Contact Number</label>
                                        <input type="text" name="contactNum" class="form-control" id="indigencyContactNum" >
                                    </div>
                                    <div class="col-6 col-md-6 input-group-sm">
                                        <label for="indigencyFormType" class="col-form-label-sm">Type of Certificate</label>
                                        <input class="form-control" type="text" name="formType"  value="Barangay Indigency" id="indigencyFormType"  readonly>
                                    </div>
                                    
                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="indigencyPurpose"  class="col-form-label-sm">Purpose</label>
                                        <input type="text" name="purpose" class="form-control" id="indigencyPurpose" >
                                    </div>

                                    <div class="col-6 col-md-3 input-group-sm">
                                        <label for="indigencyQty"  class="col-form-label-sm">Quantity</label>
                                        <input type="text" name="qty" class="form-control" id="indigencyQty" >
                                    </div>


                            </div>
                            <div class="modal-footer text-center">
                                <div class="mb-3 col-12 col-md-12 input-group-sm">
                                    <label for="indigencyFeedback" class="col-form-label-sm">Response Message</label>
                                    <textarea class="form-control" name="feedback" id="indigencyFeedback" rows="3" readonly></textarea>
                                </div>
                                <div class="col-12  col-md-12 row ">
                                    <div class="offset-1 col-5  offset-md-2 col-md-4 d-grid gap-2 text-center">
                                        <button type="submit" name="btnUpdate" class="btn btn-success">Re: Submit</button>
                                    </div>
                                    <div class="col-5 col-md-4 d-grid gap- text-center">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Back</button>
                                    </div>
                                </div>
                            </div>
                                </form>
                            </div>
                        </div>
                    </div>