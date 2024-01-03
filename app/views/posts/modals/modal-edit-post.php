<!-- Modal -->
<div class="modal fade" id="modalEditPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageDetails" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="manageDetails">Manage Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body overflow-hidden">
                <form action="<?php echo URLROOT; ?>/posts/index" method="POST" class="row g-2">
                    <div class="row g-4 ">

                        <!-- Sidebar Section -->
                        <div class="col-sm-12 col-md-12 col-lg-2">
                            <div class="row g-2  p-3 border border-2 rounded-3">
                                <h6>BRGY <?php echo htmlspecialchars($brgy_name); ?></h6>
                                <div class="d-grid gap-2 col-12 mx-auto ">
                                    <img src="<?php echo URLROOT .'/img/brgy-logo.png'; ?>" class="img-thumbnail align-center" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Post Details Section -->
                        <div class="col-sm-12 col-md-12 col-lg-10">
                            <div class="row g-2  p-3 border border-2 rounded-3">
                                <h6>POST DETAILS</h6>
                                <input type="hidden" name="id" id="id">
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="title" class="col-form-label-sm">Title</label>
                                    <input type="text-area" name="title" class="form-control" id="title">
                                </div>
                                <div class="col-6 col-md-12 input-group-sm">
                                    <label for="body" class="col-form-label-sm">Description</label>
                                    <textarea rows="4" name="body" class="form-control" id="body"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <!-- Empty section for layout purposes -->
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery to open modal and populate fields -->
<script>
$(document).on('click', '.editVenueBtn', function() {
    const id = $(this).data('id');
    const title = $(this).data('title');
    const body = $(this).data('body');

    $('#id').val(id);
    $('#title').val(title);
    $('#body').val(body);
});
</script>
