<?php  
    // Include the navbar
    include '../include/homepage/navbar.php'; 
    
    // Include the database connection
    include "connection.php";

    // Fetch records from the database
    $sql = "SELECT `completeName`, `sPosition`, `image` FROM tblofficial"; // Query the table
    $result = $con->query($sql); // Use $con->query for object-oriented mysqli
?>
<!-- service section -->

<section class="service_section layout_padding">
    
    <div class="service_container">
      <div class="container ">
        <div class="heading_container">
          <h2>
            Brgy. Washington <span>Officials</span>
          </h2>
        </div>
        <div class="row">
          <?php
          // Check if there are records
          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                  // Display each official's details
                  echo '
                  <div class="col-md-6 ">
                    <div class="box ">
                      <div class="img-box">
                        <img src="../pages/officials/image/'.basename($row['image']).'" alt="' . $row["completeName"] . '">
                      </div>
                      <div class="detail-box">
                        <h5>' . $row["completeName"] . '</h5>
                        <p>' . $row["sPosition"] . '</p>
                        <a href="login.php">
                          See more info 
                        </a>
                      </div>
                    </div>
                  </div>';
              }
          } else {
              echo "<p>No records found.</p>";
          }
          // Close the connection
          $con->close();
          ?>
        </div>
      </div>
    </div>
    <div id="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.7718196844926!2d125.48502177496948!3d9.785365126691296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x330136b7bf0035af%3A0x2931b445baf6785!2sWashington%20Barangay%20Hall%2C%20Ortiz%20Street%2C%20Surigao%20City%2C%20Surigao%20del%20Norte!5e0!3m2!1sen!2sph!4v1726725204784!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<!-- end service section -->
<?php  include '../include/homepage/footer.php'; ?>
