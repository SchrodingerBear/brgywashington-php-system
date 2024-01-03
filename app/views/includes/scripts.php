<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" ></script>
<!-- <script src="<?php echo URLROOT; ?>/js/popper.js" ></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" ></script>
<!-- <script src="<?php echo URLROOT; ?>/js/bootstrapmin.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous" ></script>
<!-- <script src="<?php echo URLROOT; ?>/js/fontawesome.js" ></script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script>
<!-- <script src="<?php echo URLROOT; ?>/js/jquery.js" ></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous" ></script>
<!-- <script src="<?php echo URLROOT; ?>/js/chart.js" ></script> -->

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<!-- <script src="<?php echo URLROOT; ?>/js/simple-datatables.js" ></script> -->

<script src="<?php echo URLROOT; ?>/js/scripts.js" ></script>

<!-- data tables script -->
<script src="<?php echo URLROOT;?>/js/datatables-simple-demo.js"></script>
<script src="<?php echo URLROOT;?>/js/chart-area-demo.js"></script>
<script src="<?php echo URLROOT;?>/js/chart-bar-demo.js"></script>
<script src="<?php echo URLROOT;?>/js/chart-pie-demo.js"></script>

<!-- sweet alert -->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script> -->
<script src="<?php echo URLROOT; ?>/js/sweetalert.js" ></script>

 

<script >
        <?php if($this->session->getFlash('status')){ ?>
        
        swal({
        title: "<?php echo $this->session->getFlash('status') ?>",
        text: "<?php echo $this->session->getFlash('status_text') ?>",
        icon: "<?php echo $this->session->getFlash('status_icon') ?>",
        button: "Ok",
       
    });

   
        
   <?php } ?>
   <?php ?>
   </script>

   <script>
    function confirmSendMessage(postId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to send this message?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, send it!',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`messageForm_${postId}`).submit(); // Submit form if confirmed
        }
    });
}

   </script>
   
    






<!-- main script -->
<script src="<?php echo URLROOT;?> /js/scripts.js" ></script>