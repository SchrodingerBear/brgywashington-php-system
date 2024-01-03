<?php
// Include database connection
require_once('../app/libraries/Database.php');

// Create a new instance of the Database class
$db = new Database();

// Initialize default values
$logo = 'public/img/default_logo.png';
$mobile_number = 'Not Available';
$email = 'Not Available';
$address = 'Not Available';
$brgy_name = 'Not Available';
$about = 'Not Available';
$province = 'Not Available';
$municipality = 'Not Available';

// Fetch data from the database using PDO
$sql = "SELECT brgy_name, pic_logo, about,province, municipality, mobile_number, address, email FROM brgy_detail LIMIT 1";
$db->query($sql);

$row = $db->single(); // Fetch a single record as an object

if ($row) {
    // Construct the URL for the logo and update other variables
    $logo = !empty($row->pic_logo) ? 'public/img/' . $row->pic_logo : $logo;
    $mobile_number = $row->mobile_number ?? $mobile_number;
    $email = $row->email ?? $email;
    $address = $row->address ?? $address;
    $brgy_name = $row->brgy_name ?? $brgy_name;
    $about = $row->about ?? $about;
    $province = $row->province ?? $province;
    $municipality = $row->municipality ?? $municipality;
}
?>

<link rel="shortcut icon" href="<?php echo URLROOT . '/' . htmlspecialchars($logo) . '?v=' . time(); ?>" type="image/png">
<title>Barangay <?php echo htmlspecialchars($brgy_name); ?></title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<body class="sb-nav-fixed">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Brand/logo -->
        <a class="navbar-brand ps-3" href="<?php echo URLROOT . '/users/index' ?>">
            <img src="<?php echo URLROOT .'/img/brgy-logo.png '?>" class="img-fluid" width="50">
            <span>Brgy <?php echo htmlspecialchars($brgy_name); ?></span>
        </a>

        <!-- Mobile toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Home link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT . '/users/index' ?>">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <!-- My Request link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT . '/users/myrequest' ?>">
                        <i class="far fa-comment-alt"></i> My Request
                    </a>
                </li>
                <!-- Announcements link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT . '/users/announcement' ?>">
                        <i class="fas fa-bullhorn"></i> Announcements
                    </a>
                </li>
                <!-- Rent Facilities link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT . '/users/facility' ?>">
                        <i class="fa-solid fa-book"></i> Rent Facilities
                    </a>
                </li>
                <!-- User dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['firstname'] . ' ' . $_SESSION['lastname']); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="<?php echo URLROOT . '/users/profile' ?>">
                                <img src="<?php echo URLROOT . '/img/' . $_SESSION['profile_pic'] ?>" class="img-fluid rounded-circle me-2" style="width:25px;" alt="">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo URLROOT . '/users/password' ?>">Change Password</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo URLROOT . '/users/logout' ?>">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

        

            