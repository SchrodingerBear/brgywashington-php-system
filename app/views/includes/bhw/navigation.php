<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?php echo URLROOT . '/users/index' ?>">
                <div class="row g-3">
                    <img src="<?php echo URLROOT .'/img/brgy-logo.png '?>" id="nav-logo" class="img-fluid col-4 col-md-4" width="80px">
                    <div class="col-8 col-md-8 d-flex align-items-center">
                        <div class="row g-0">
                            <div class="col-12 col-md-12 text-logo-s text-primary">Barangay Washington</div>
                            <div class="col-12 col-md-12 text-logo-e text-secondary">Surigao City, SDN</div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 d-lg-none d-block" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo URLROOT . '/users/profile' ?>">
                            <div class="sb-nav-link-icon text-center"><img src="<?php echo URLROOT . '/img/' . $_SESSION['profile_pic'] ?>" class="img-fluid rounded-circle" style="width:25px;" alt=""></div>
                            <div class="text-center"><span><?php echo  $_SESSION['firstname']. ' '. $_SESSION['lastname'] ?></span></a></div>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo URLROOT . '/users/password' ?>">Change Password</a></li>
                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-tranparent " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link  mt-3 " href="<?php echo URLROOT. '/users/profile' ?>">
                                <div class="sb-nav-link-icon"><img src="<?php echo URLROOT . '/img/' . $_SESSION['profile_pic'] ?>" class="img-fluid rounded-circle" style="width:35px;" alt=""></div>
                                <h6 class="text-dark "><?php echo  $_SESSION['firstname']. ' '. $_SESSION['lastname'] ?></h6>
                            </a>
                            <hr>

                            <a class="nav-link text-dark" href="<?php echo URLROOT. '/users/myrequest' ?>">
                                <div class="sb-nav-link-icon"><i class="far fa-comment-alt"></i></div>
                                My Request
                            </a>

                            <a class="nav-link text-dark " href="<?php echo URLROOT; ?>/residents/index">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Residents
                            </a>

                            <a class="nav-link text-dark " href="<?php echo URLROOT; ?>/residents/pantawid_pamilya">
                                <div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>
                                4ps
                            </a>

                            <a class="nav-link text-dark " href="<?php echo URLROOT; ?>/residents/single_mother">
                                <div class="sb-nav-link-icon"><i class="fas fa-female"></i></div>
                                Single mother
                            </a>

                            <a class="nav-link text-dark " href="<?php echo URLROOT; ?>/residents/senior_citizen">
                                <div class="sb-nav-link-icon"><i class="fas fa-hiking"></i></div>
                                Senior Citizen
                            </a>

                            

                        </div>
                    </div>
                </nav>
            </div>