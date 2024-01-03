<?php
    require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/admin/navigation.php';
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Dashboard</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="row g-2">

                            <div class="col-12 col-md-7">

                                <div class="col-lg-12">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-pie me-1"></i>
                                            Residents Data
                                        </div>
                                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                        <div class="card ">
                                        <div class="card-header">
                                        <i class="fas fa-bullhorn"></i>
                                            BARANGAY OFFICIALS
                                        </div>
                                            <div class="card-body">
                                            <form action="<?php echo URLROOT; ?>/admins/index" method="POST" enctype="multipart/form-data">
                                                <img src="<?php echo URLROOT .'/img/layout/'. $data['content']->photo?>" onclick="triggerClickContent()" class="img-fluid mb-2" id="contentDisplay" alt="">
                                                <label for="formContent" class="form-label btn btn-secondary rounded-pill btn-sm"><i class="fas fa-edit"></i>&nbsp;</label>
                                                <input class="form-control" type="file" value ="<?php echo $data['content']->photo?>" name="changeContent" onchange="displayContent(this)" id="formContent" accept="image/jpg">
                                                <button type="submit" name="saveContent" class="text-center btn btn-primary btn-sm rounded-pill float-end">Save changes</button>
                                            </form>    
                                        </div>
                                        </div>
                                </div>

                            </div>

                            

                            <div class="col-12 col-md-5">
                                <div class="row g-1">

                                <div class="solution_cards_box col-md-12">
                                    <div class="solution_card card_01">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Pending<br> document request</h3><h1 class="text-end position-absolute end-0 pe-3 "><?php echo $data['totalPendingRequest'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT. '/certificates/request' ?>" type="button" class="read_more_btn card_001 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-12">
                                    <div class="solution_card card_01">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Pending<br> Facility request</h3><h1 class="text-end position-absolute end-0 pe-3 "><?php echo $data['totalPendingRequest'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT. '/requests/index' ?>" type="button" class="read_more_btn card_001 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-12">
                                    <div class="solution_card card_06">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>To verify<br>accounts</h3><h1 class="text-end position-absolute end-0 pe-3"><?php echo $data['totalToVerify'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT.'/accounts/index'?>" type="button" class="read_more_btn card_006 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-12">
                                    <div class="solution_card card_03">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Total<br>residents</h3><h1 class="text-end position-absolute end-0 pe-3 "><?php echo $data['totalResidents'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT. '/residents/index' ?>" type="button" class="read_more_btn card_003 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-6">
                                    <div class="solution_card card_04">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Indigent<br>family</h3><h1 class="text-end position-absolute end-0 pe-3"><?php echo $data['totalIndigent'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT.'/residents/indigent'?>" type="button" class="read_more_btn card_004 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-6">
                                    <div class="solution_card card_05">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Single<br>mother</h3><h1 class="text-end position-absolute end-0 pe-3 "><?php echo $data['totalSingleMother'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT . '/residents/single_mother' ?>" type="button" class="read_more_btn card_005 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-6">
                                    <div class="solution_card card_06">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>4ps<br>family</h3><h1 class="text-end position-absolute end-0 pe-3"><?php echo $data['total4ps'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT.'/residents/pantawid_pamilya'?>" type="button" class="read_more_btn card_006 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-6">
                                    <div class="solution_card card_01">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Senior<br>citizen</h3><h1 class="text-end position-absolute end-0 pe-3 "><?php echo $data['totalSeniorCitizen'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT. '/residents/senior_citizen' ?>" type="button" class="read_more_btn card_001 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-6">
                                    <div class="solution_card card_02">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Registered<br>voters</h3><h1 class="text-end position-absolute end-0 pe-3"><?php echo $data['totalVoters'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT . '/residents/voters' ?>" type="button" class="read_more_btn card_002 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-6">
                                    <div class="solution_card card_03">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Persons with<br>disabilities</h3><h1 class="text-end position-absolute end-0 pe-3 "><?php echo $data['totalPwd'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT . '/residents/pwd' ?>" type="button" class="read_more_btn card_003 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-6">
                                    <div class="solution_card card_04">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Total<br>Vaccinated</h3><h1 class="text-end position-absolute end-0 pe-3"><?php echo  $data['totalVaccinated'] ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT . '/residents/vaccinated' ?>" type="button" class="read_more_btn card_004 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="solution_cards_box col-md-6">
                                    <div class="solution_card card_05">
                                        <div class="hover_color_bubble"></div>

                                        <div class="solu_title">
                                        <h3>Covid<br>Positive</h3><h1 class="text-end position-absolute end-0 pe-3"><?php echo $data['totalCovidPositive']  ?></h1>
                                        </div>
                                        <div class="solu_description">
                                        <p>
                                        </p>
                                        <a href="<?php echo URLROOT.'/residents/covid_case'?>" type="button" class="read_more_btn card_005 btn-card">View</a>
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>




 

                        </div>



                         <!-- Content Goes here -->


                        <input type="hidden" id="totalResidents" value="<?php echo $data['totalResidents'] ?>" >
                        <input type="hidden" id="totalSingleMother" value="<?php echo $data['totalSingleMother'] ?>" >
                        <input type="hidden" id="totalVoters" value="<?php echo $data['totalVoters'] ?>" >
                        <input type="hidden" id="totalVaccinated" value="<?php echo $data['totalVaccinated'] ?>" >
                        <input type="hidden" id="totalSeniorCitizen" value="<?php echo $data['totalSeniorCitizen'] ?>" >


                    </div>
                </main>

<?php
    require APPROOT . '/views/includes/footer.php';
?>