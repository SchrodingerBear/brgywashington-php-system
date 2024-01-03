<div class="modal fade" id="modalRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" style="padding: 15px;">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h3 class="modal-title" id="manageDetails">Sign Up</h3>


                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>
                            <div class="modal-body">


                            <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                                <div class="row g-3">
                                    <div class="col-6 col-md-6">
                                        <input type="text" class="form-control" placeholder="First name" name="firstName"  aria-label="First name">
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <input type="text" class="form-control" placeholder="Last name" name="lastName" aria-label="Last name">
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username">
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <input type="text" class="form-control" placeholder="Mobile Number" name="mobileNumber" aria-label="Mobile Number">
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <input type="password" class="form-control" placeholder="New password" name="password" aria-label="New password">
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <input type="password" class="form-control" placeholder="Confirm password" name="confirmPassword" aria-label="Confirm password">
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <select id="inputSuffix" name="gender"  class="form-select" aria-label="Gender">
                                        <option disabled selected>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <select id="inputPurokNumber" name="purokNumber"  class="form-select" aria-label="Purok no">
                                        <option disabled selected>Purok no.</option>
                                        <option value="Purok 1">Purok 1</option>
                                        <option value="Purok 2">Purok 2</option>
                                        <option value="Purok 3">Purok 3</option>
                                        <option value="Purok 4">Purok 4</option>
                                        <option value="Purok 5">Purok 5</option>
                                        <option value="Purok 6">Purok 6</option>
                                        <option value="Purok 7">Purok 7</option>
                                        </select>
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" type="submit"><h6 class="my-auto">Sign Up</h6></button>
                                    </div>
                                </div>
                            </form>   

                            </div>

                            </div>
                        </div>
                    </div>