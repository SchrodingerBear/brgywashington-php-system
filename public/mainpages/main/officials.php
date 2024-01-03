<?php
// Include database connection
include('connection.php');

// Fetch all records from the brgy_official table
$sql = "SELECT `fullname`, `position`, `committee` FROM brgy_official"; // Query the table
$result = mysqli_query($con, $sql);

$officials = []; // Array to hold all officials' data

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $officials[] = $row; // Add each row to the officials array
    }
}


?>

<?php
// Include the navbar
include '../include/homepage/navbar.php'; 
?>

<!-- service section -->
<section class="service_section layout_padding">
    <div class="service_container">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Barangay<span> Officials</span>
                </h2>
            </div>
            <div class="row">
                <?php 
                // Loop through the officials array and display each official
                foreach ($officials as $index => $official): ?>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="detail-box">
                                <h5>
                                    <?php echo htmlspecialchars($official['fullname']); ?>
                                </h5>
                                <p>
                                    <?php echo htmlspecialchars($official['position']); ?>
                                </p>
                                <p>
                                   <?php echo htmlspecialchars($official['committee']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
       
      
    
    </div>
   
</section>

<!-- end service section -->
<?php include '../include/homepage/footer.php'; ?>
