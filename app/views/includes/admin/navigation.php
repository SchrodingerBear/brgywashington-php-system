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




<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo URLROOT . '/' . htmlspecialchars($logo) . '?v=' . time(); ?>" type="image/png">

<style>
    
</style>


<title>Barangay <?php echo htmlspecialchars($brgy_name); ?>, <?php echo htmlspecialchars($municipality); ?> <?php echo htmlspecialchars($province); ?></title>

<body class="sb-nav-fixed">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Menubar Logo and Brand Name -->
        <a class="navbar-brand d-flex align-items-center" href="<?php echo URLROOT . '/admins/index'; ?>">
            <img src="<?php echo URLROOT . '/img/brgy-logo.png'; ?>" id="nav-logo" class="img-fluid me-2" width="40" alt="Barangay Logo">
            <div class="d-flex flex-column">
                <span class="text-primary mb-0">Brgy <?php echo htmlspecialchars($brgy_name); ?></span>
                <small class="text-secondary"><?php echo htmlspecialchars($municipality); ?> </small>
            </div>
        </a>

        <!-- Mobile Sidebar Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Menu Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/admins/index">
                        <i class="fas fa-home me-1"></i>Dashboard
                    </a>
                </li>

                <!-- Barangay Officials -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/admins/brgy_official">
                        <i class="fas fa-user-shield me-1"></i>Barangay Officials
                    </a>
                </li>

                <!-- Residents -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/residents/index">
                        <i class="fas fa-users me-1"></i>Residents
                    </a>
                </li>

                <!-- Certification -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/certificates/index">
                        <i class="fas fa-file-signature me-1"></i>Certification
                    </a>
                </li>

                <!-- Announcements -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/posts/index">
                        <i class="fas fa-bullhorn me-1"></i>Announcements
                    </a>
                </li>

                <!-- Facilities -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/venues/index">
                        <i class="fa-solid fa-shop me-1"></i>Facilities
                    </a>
                </li>

                <!-- Accounts Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-check me-1"></i>Accounts
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountsDropdown">
                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/accounts/index">
                            <div class="badge rounded-pill bg-warning text-dark">To Verify&nbsp;<i class="fas fa-search"></i></div>
                        </a></li>
                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/accounts/verified">
                            <div class="badge rounded-pill bg-primary text-light">Verified&nbsp;<i class="fas fa-check"></i></div>
                        </a></li>
                    </ul>
                </li>

                <!-- Online Requests -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/certificates/request">
                        <i class="fas fa-globe me-1"></i>Document Requests
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/requests/index">
                        <i class="fas fa-clipboard-list me-1"></i>Facility Requests
                    </a>
                </li>

                <!-- Barangay Details -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/admins/barangay_detail">
                        <i class="fas fa-info-circle me-1"></i>Barangay Details
                    </a>
                </li>

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li class="dropdown-item text-center">
                            <img src="<?php echo URLROOT . '/img/id/resident/placeholder.png'; ?>" class="img-fluid" style="width:25px;" alt="">
                            <div><span><?php echo $_SESSION['username']; ?></span></div>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo URLROOT . '/admins/password'; ?>">Change Password</a></li>
                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

        
                    <div class="sb-sidenav-footer">
                   
<!-- JavaScript for real-time update -->


<!-- JavaScript for real-time update -->
<script>
function updateTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours() % 12 || 12; // 12-hour format
    var minutes = currentTime.getMinutes().toString().padStart(2, '0');
    var seconds = currentTime.getSeconds().toString().padStart(2, '0');
    var ampm = currentTime.getHours() >= 12 ? 'PM' : 'AM';
    
    document.getElementById("timeDisplay").innerHTML = hours + ":" + minutes + ":" + seconds + " " + ampm;
}

setInterval(updateTime, 1000); // Update time every second
</script>

<!-- Style for time display -->
<style>
#timeDisplay {
    color: green; /* Make the time green */
}
</style>


                        
                    </div>
                </nav>
            </div>