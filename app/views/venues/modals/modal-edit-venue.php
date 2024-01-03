<div class="modal fade" id="modalEditVenue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editVenueDetails" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVenueDetails">Edit Venue Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body overflow-hidden">
                <form action="<?php echo URLROOT; ?>/venues/update" method="POST" class="row g-2">
                    <div class="row g-4">
                        <!-- Sidebar Section -->
                        <div class="col-sm-12 col-md-12 col-lg-2">
                            <div class="row g-2 p-3 border border-2 rounded-3">
                                <h6>BRGY WASHINGTON</h6>
                                <div class="d-grid gap-2 col-12 mx-auto">
                                    <img src="<?php echo URLROOT .'/img/brgy-logo.png'; ?>" class="img-thumbnail align-center" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Venue Details Section -->
                        <div class="col-sm-12 col-md-12 col-lg-10">
                            <div class="row g-2 p-3 border border-2 rounded-3">
                                <h6>VENUE DETAILS</h6>
                                <input type="hidden" name="id" id="venue_id">
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="name" class="col-form-label-sm">Venue Name</label>
                                    <input type="text" name="name" class="form-control" id="venue_name" required>
                                </div>
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="location" class="col-form-label-sm">Location</label>
                                    <input type="text" name="location" class="form-control" id="venue_location" required>
                                </div>
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="capacity" class="col-form-label-sm">Capacity</label>
                                    <input type="number" name="capacity" class="form-control" id="venue_capacity" required>
                                </div>
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="date_added" class="col-form-label-sm">Date Added</label>
                                    <input type="date" name="date_added" class="form-control" id="venue_date_added" required>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Changes</button>
            </div>
                </form>
        </div>
    </div>
</div>
