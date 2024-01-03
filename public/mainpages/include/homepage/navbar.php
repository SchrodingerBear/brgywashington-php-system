<?php
// Include database connection
include('connection.php');

// Fetch logo from the database
$sql = "SELECT brgy_name, pic_logo, mobile_number, province, municipality, address, email FROM brgy_detail LIMIT 1";
$result = mysqli_query($con, $sql);

$logo = '';
$mobile_number = '';
$address = '';
$brgy_name = '';
$province = '';
$municipality = '';

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Construct absolute URL for the logo
    $logo = 'http://localhost/brgywashington/public/img/' . $row['pic_logo'];
    $mobile_number = $row['mobile_number'];
    $email = $row['email'];
    $address = $row['address'];
    $brgy_name = $row['brgy_name'];
    $province = $row['province'];
    $municipality = $row['municipality'];
}

// Default logo if no result
if (empty($logo)) {
    $logo = 'http://localhost/brgywashington/public/img/default_logo.png';
}

if (empty($mobile_number)) {
  $mobile_number = 'Not Available';
}
if (empty($email)) {
  $email = 'Not Available';
}
if (empty($address)) {
  $address = 'Not Available';
}
if (empty($brgy_name)) {
  $brgy_name = 'Not Available';
}
if (empty($province)) {
  $province = 'Not Available';
}
if (empty($municipality)) {
  $municipality = 'Not Available';
}

?>





<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="<?php echo htmlspecialchars($logo); ?>" type="image/png">


  <title><?php echo htmlspecialchars($brgy_name); ?></title>


  
  <link rel="stylesheet" type="text/css" href="../css/css/bootstrap.css" />

  
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  
  <link href="../css/css/font-awesome.min.css" rel="stylesheet" />

 
  <link href="../css/css/style.css" rel="stylesheet" />
  
  <link href="../css/css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid ">
          <div class="contact_nav">
            <a href="tel:09859691310">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
    Call : <?php echo htmlspecialchars($mobile_number); ?>
</span>

            </a>
            <a href="mailto:jefreylariba@gmail.com">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                Email : <?php echo htmlspecialchars($email); ?>
              </span>
            </a>
            <a href="#" onclick="toggleMap(event)">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
              Brgy. <?php echo htmlspecialchars($brgy_name); ?>, <?php echo htmlspecialchars($municipality); ?>, <?php echo htmlspecialchars($province); ?>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
            <img src="<?php echo htmlspecialchars($logo); ?>" alt="Logo" style="height: 50px; width: auto; margin-right: 8px;">

              <span>
              <?php echo htmlspecialchars($brgy_name); ?>
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <?php $current_page = basename($_SERVER['PHP_SELF']); ?>

                <li class="nav-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="../main/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="../main/services.php">Services</a>
                </li>
                <li class="nav-item <?php echo ($current_page == 'about.php' || $current_page == 'officials.php') ? 'active' : ''; ?>">

                    <a class="nav-link" href="../main/about.php">About</a>
                </li>
                <li class="nav-item <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="../main/contact.php">Contact Us</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/brgywashington/users/login"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
                </li>

               

                
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  
<!-- content -->



 

  