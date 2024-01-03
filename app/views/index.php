<?php
    require APPROOT . '/views/includes/head.php';
?>

<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light d-flex justify-content-between">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">
                <div class="row g-3">
                    <img src="<?php echo URLROOT .'/img/2.png '?>" id="nav-logo" class="img-fluid col-4 col-md-4" width="80px">
                    <div class="col-8 col-md-8 d-flex align-items-center">
                        <div class="row g-0">
                            <div class="col-12 col-md-12 text-logo-s text-primary">Barangay Washington</div>
                            <div class="col-12 col-md-12 text-logo-e text-secondary">Surigao City SDN</div>
                        </div>
                    </div>
                </div>
            </a>
            <ul class="nav-list">
                <li><a class="text-secondary d-none d-md-block" href="#">Home</a></li>
                <li><a class="text-secondary d-none d-md-block" href="#">About</a></li>
                <li><a class="btn-custom" href="#">Sign In</a></li>
            </ul>
        </nav>

                <main>

                <div class="full-screen-header">

                    <h1 class="title ">Barangay washington</h1>
                    <span class="sub-title text-secondary">Listahan Management System</span>
                    <a class="btn-custom" href="#">Get Started</a>
                    <img class="scroll-down-icon" src="img/angle-down-solid.svg" alt="" width="50px"> 
                </div>


                <div class="container-fluid px-4">

                    <div class="row gx-5">
                        <div class="col-12 offset-md-3 col-md-6">

                            <div class="col-12  col-md-12">
                                <div class="row mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">

                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                    <img src="<?php echo URLROOT . '/img/layout/1.png' ?>" class="d-block w-100" alt="...">
                                                    <div class="carousel-caption d-none  d-md-block">
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="<?php echo URLROOT . '/img/layout/2.png' ?>" class="d-block w-100" alt="...">
                                                    <div class="carousel-caption d-none  d-md-block">
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="<?php echo URLROOT . '/img/layout/3.png' ?>" class="d-block w-100" alt="...">
                                                    <div class="carousel-caption d-none  d-md-block">
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="<?php echo URLROOT . '/img/layout/4.png' ?>" class="d-block w-100" alt="...">
                                                    <div class="carousel-caption d-none  d-md-block">
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="<?php echo URLROOT . '/img/layout/5.png' ?>" class="d-block w-100" alt="...">
                                                    <div class="carousel-caption d-none  d-md-block">
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="<?php echo URLROOT . '/img/layout/6.png' ?>" class="d-block w-100" alt="...">
                                                    <div class="carousel-caption d-none  d-md-block">
                                                    </div>
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  col-md-12">
                                <div class="row mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                        <img src="<?php echo URLROOT . '/img/layout/barangay-officials.png'?>" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  col-md-12">
                                <div class="row mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                        <img src="<?php echo URLROOT . '/img/layout/emergency-hotlines.png'?>" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4 d-none  d-md-block">


                        </div> -->






                    </div>



                </div>







                </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; SNSU IT <?php echo date('Y') ?></div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
        <?php require APPROOT . '/views/includes/scripts.php'; ?>
</body>
</html>