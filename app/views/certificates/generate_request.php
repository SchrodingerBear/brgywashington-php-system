<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    if($_SESSION['account_type'] == 1){
        require APPROOT . '/views/includes/admin/navigation.php'; 
    }
    if($_SESSION['account_type'] == 2){
        require APPROOT . '/views/includes/bhw/navigation.php'; 
    }
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                            <h3 class="mt-4">Generate Online Request</h3>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Generate Online Request</li>
                                </ol>
                                <div class="page-inner">
                                    <div class="row mt--2">
                                        <div class="col-md-12">

                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-6 col-md-5">
                                                        Online Request
                                                        </div>
                                                        <div class="col-6 col-md-5">
        

                                                        </div>
                                                        <div class="col-6 col-md-2  d-grid gap-2">
                                                            <button class="btn btn-primary btn-sm" onclick="printDiv('printThis')">
                                                            <i class="fa fa-print"></i>
                                                            Print List
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body m-5" id="printThis">
                                                    <div class="d-flex flex-wrap justify-content-around">
                                                        <div class="text-center">
                                                            <img src="<?php echo URLROOT .'/img/'. $data['detail']->pic_logo?>" class="img-fluid" width="125">
                                                        </div>
                                                        <div id="cert-head" class="text-center mt-5">
                                                            <h3 class="mb-0"></h3>
                                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                                            <h3 class="mb-0"><?php echo htmlspecialchars($province); ?></h3>
                                                            <h3 class="mb-0"><?php echo htmlspecialchars($municipality); ?></h3>
                                                            <h1 class="fw-bold mb-0">Barangay <?php echo htmlspecialchars($brgy_name); ?></i></h2>
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="<?php echo URLROOT .'/img/Surigao_City_Seal.png'?>?>" class="img-fluid" width="125">
                                                        </div>
                                                    </div>
  

                                                    <table class="table caption-top mt-2">
                                                        <?php
                                                            if($data['issued']){ ?>
                                                                <caption><h6>Online Request<br>Issued of Year: <?php echo $data['issued']; ?></h6></caption>
                                                                <caption>Total: <?php echo $data['total'] ?></caption>
                                                          <?php  }else{ ?>
                                                               <script>history.back()</script>
                                                         <?php }
                                                        ?>

                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Type</th>
                                                                <th>Purpose</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                                if($data['request']){ ?>
                                                                    <?php foreach ($data['request'] as $certificate):?>
                                                                        <tr>
                                                                            <td><?php echo $certificate->last_name . ',' . $certificate->first_name . ' ' .$certificate->middle_name. ' ' . $certificate->suffix; ?></td>
                                                                            <td><?php echo $certificate->form_type;?></td>
                                                                            <td><?php echo $certificate->purpose;?></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php }
                                                            ?>

                                                        </tbody>
                                                    </table>
 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                            



                    </div>
                </main>


<?php
    require APPROOT . '/views/includes/footer.php';
?>