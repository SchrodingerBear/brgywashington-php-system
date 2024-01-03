<div class="modal fade" id="modalViewResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="manageDetails">View Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body overflow-hidden">
                                <form action="<?php echo URLROOT; ?>/residents/modalAddResident" method="POST" enctype="multipart/form-data">
                                    <div class="row g-4 ">

                                        <div class="col-sm-12 col-md-12 col-lg-4">
                                            <div class="row gx-2  p-3 border border-2 rounded-3">
                                                <h6>PHOTO&nbsp;</h6>
                                                <div class="d-grid gap-2 col-12 mx-auto ">
                                                    <img src="<?php echo URLROOT .'/img/img-placeholder.jpg'?>" class="img-thumbnail" id="viewDisplayResident" alt="">

                                                </div>
                                                <div class="col col-md-12">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-8 ">
                                            <div class="row  p-3 border border-2 rounded-3">
                                                <h6>PERSONAL INFORMATION&nbsp;</h6>
                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewLastName" class="col-form-label-sm">Last Name</label>
                                                    <h6  id="viewLastName">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewFirstName" class="col-form-label-sm">First Name</label>
                                                    <h6 id="viewFirstName">&nbsp;</h6>
                                                </div>
                                                <div class="col-6  col-md-3 input-group-sm border border-1">
                                                    <label for="viewMiddleName" class="col-form-label-sm">Middle Name</label>
                                                    <h6 id="viewMiddleName">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewSuffix" class="col-form-label-sm">Suffix</label>
                                                    <h6 id="viewSuffix">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewGender" class="col-form-label-sm">Gender</label>
                                                    <h6 id="viewGender">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm  border border-1">
                                                    <label for="viewBirthDate" class="col-form-label-sm">Birth Date</label>
                                                    <h6 id="viewBirthDate">&nbsp;</h6>
                                                </div>
                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewBirthPlace" class="col-form-label-sm">Birth Place</label>
                                                    <h6 id="viewBirthPlace">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewAge" class="col-form-label-sm">Age</label>
                                                    <h6 id="viewAge">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewCivilStatus" class="col-form-label-sm">Civil Status</label>
                                                    <h6 id="viewCivilStatus">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1 border border-1">
                                                    <label for="viewNationality" class="col-form-label-sm">Nationality</label>
                                                    <h6 id="viewNationality">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewReligion" class="col-form-label-sm">Religion</label>
                                                    <h6 id="viewReligion">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewOccupation" class="col-form-label-sm">Occupation</label>
                                                    <h6 id="viewOccupation">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewContactNum" class="col-form-label-sm">Contact Number</label>
                                                    <h6 id="viewContactNum">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewPwd" class="col-form-label-sm">PWD?</label>
                                                    <h6 id="viewPwd">&nbsp;</h6>
                                                </div>

                                                
                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewPwdId" class="col-form-label-sm">PWD ID.No</label>
                                                    <h6 id="viewPwdId">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewFamilyMonthlyIncome" class="col-form-label-sm">Family Monthly Income</label>
                                                    <h6 id="viewFamilyMonthlyIncome">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewIndigent" class="col-form-label-sm">Indigent?</label>
                                                    <h6 id="viewIndigent">&nbsp;</h6>

                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewSoloParent" class="col-form-label-sm">Solo Parent?</label>
                                                    <h6 id="viewSoloParent">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewSoloParentId" class="col-form-label-sm">Solo Parent ID No.</label>
                                                    <h6 id="viewSoloParentId">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewpantawidPamilya" class="col-form-label-sm">4ps member</label>
                                                    <h6 id="viewpantawidPamilya">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewVoter" class="col-form-label-sm">Register Voter?</label>
                                                    <h6 id="viewVoter">&nbsp;</h6>
                                                </div>


                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewPurok" class="col-form-label-sm">Purok No.</label>
                                                    <h6 id="viewPurok">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewHouseNo" class="col-form-label-sm">House No.</label>
                                                    <h6 id="viewHouseNo">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-3 input-group-sm border border-1">
                                                    <label for="viewStreet" class="col-form-label-sm">Street</label>
                                                    <h6 id="viewStreet">&nbsp;</h6>
                                                </div>
                                                

                                            </div>

            
                                            
                                        </div>



                                        <div class="col-sm-12 col-md-12 col-lg-4">

                                            <div class="row gx-2 p-3 border border-2 rounded-3">
                                                <h6>IN CASE OF EMERGENCY&nbsp;</h6>
                                                <div class="col-6 col-md-12 input-group-sm border border-1">
                                                    <label for="viewToContactFullName" class="col-form-label-sm">Full Name</label>
                                                    <h6 id="viewToContactFullName">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-6 input-group-sm border border-1">
                                                    <label for="viewToContactRelationship" class="col-form-label-sm">Relationship</label>
                                                    <h6 id="viewToContactRelationship">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-6 input-group-sm border border-1">
                                                    <label for="viewToContactNumber" class="col-form-label-sm">Contact No.</label>
                                                    <h6 id="viewToContactNumber">&nbsp;</h6>
                                                </div>

                                                <div class="col-6 col-md-12 input-group-sm border border-1">
                                                    <label for="viewToContactAddress" class="col-form-label-sm">Address</label>
                                                    <h6 id="viewToContactAddress">&nbsp;</h6>
                                                </div>


                                            </div>
                                        </div>

                                        
                                        <div class="col-sm-12 col-md-12 col-lg-8">
                                            <div class="row  border border-2 rounded-3">
                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                    <div class="row  p-3 ">
                                                        <h6>OTHER DETAILS&nbsp;</h6>
                                                        
                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewNationalIdNo" class="col-form-label-sm">National ID No.</label>
                                                            <h6 id="viewNationalIdNo">&nbsp;</h6>
                                                        </div>
                                                        
                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewPhilhealthNo" class="col-form-label-sm">Philhealth No.</label>
                                                            <h6 id="viewPhilhealthNo">&nbsp;</h6>
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewSssNo" class="col-form-label-sm">SSS No.</label>
                                                            <h6 id="viewSssNo">&nbsp;</h6>
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="pagibigNo" class="col-form-label-sm">Pagibig No.</label>
                                                            <h6 id="pagibigNo">&nbsp;</h6>
                                                        </div>


                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewTinNo" class="col-form-label-sm">TIN No.</label>
                                                            <h6 id="viewTinNo">&nbsp;</h6>
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewVotersIdNo" class="col-form-label-sm">Voters ID No.</label>
                                                            <h6 id="viewVotersIdNo">&nbsp;</h6>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                    <div class="row p-3">
                                                        <h6 class="invisible">>OTHER DETAILS&nbsp;</h6>
                                                        
                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewCovidStatus" class="col-form-label-sm">Covid Status</label>
                                                            <h6 id="viewCovidStatus">&nbsp;</h6>
                                                        </div>
                                                        


                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewVaccinated" class="col-form-label-sm">Vaccinated</label>
                                                            <h6 id="viewVaccinated">&nbsp;</h6>
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewDateOfRegistration" class="col-form-label-sm">Date of Registration</label>
                                                            <h6 id="viewDateOfRegistration">&nbsp;</h6>
                                                        </div>
                                                        

                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewDateOfDeath" class="col-form-label-sm">Date of Death</label>
                                                            <h6 id="viewDateOfDeath">&nbsp;</h6>
                                                        </div>

                                                        <div class="col-6 col-md-6 input-group-sm border border-1">
                                                            <label for="viewDateOfDeath" class="col-form-label-sm">Alive or Deseased</label>
                                                            <h6 id="viewAliveDeseased">&nbsp;</h6>
                                                        </div>

                                                        

                                                    </div>
                                                </div>

                                                

                                            </div>
                                            
                                            

                                        </div>
                        
                                        <div class="col-6 offset-md-8 col-md-4 mt-1"><span class="badge bg-info text-light mt-1" id="viewAddedBy"></span></div>
                                        <div class="col-6 offset-md-8 col-md-4 mt-1"><span class="badge bg-info text-light mt-1" id="viewUpdatedBy"></span></div>
   


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