<?php
// Include database connection
include('connection.php');

// Fetch logo from the database
$sql = "SELECT brgy_name, pic_logo, mobile_number, bg_image, address, email FROM brgy_detail LIMIT 1";
$result = mysqli_query($con, $sql);

$logo = '';
$mobile_number = '';
$address = '';
$brgy_name = '';
$bg = '';
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Construct absolute URL for the logo
    $logo = 'http://localhost/brgywashington/public/img/' . $row['pic_logo'];
    $bg = 'http://localhost/brgywashington/public/img/' . $row['bg_image'];
    $mobile_number = $row['mobile_number'];
    $email = $row['email'];
    $address = $row['address'];
    $brgy_name = $row['brgy_name'];
    
}

// Default logo if no result
if (empty($logo)) {
    $logo = 'http://localhost/brgywashington/public/img/default_logo.png';
}
if (empty($bg)) {
  $bg = 'http://localhost/brgywashington/public/img/default_bg.png';
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


?>




<?php  include '../include/homepage/navbar.php' ?>

<!-- slider section -->
<section class="slider_section ">
  <div class="slider_bg_box">
  <img src="<?php echo htmlspecialchars($bg); ?>"  >
   
  </div>
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container ">
          <div class="row">
            <div class="col-md-7 ">
              <div class="detail-box">
                <h1>
                  Barangay <span> <?php echo htmlspecialchars($brgy_name); ?></span>
                </h1>
                <p>
                  A web-based system for Registration and Social Services among Barangay <?php echo htmlspecialchars($brgy_name); ?> aims to streamline the process of community engagement and service delivery. By providing an accessible platform, it enhances transparency and fosters greater participation from residents in Barangay <?php echo htmlspecialchars($brgy_name); ?>.
                </p>
                <div class="btn-box">
                  <a href="about.php" class="btn1">
                    More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container ">
          <div class="row">
            <div class="col-md-7 ">
              <div class="detail-box">
                <h1>
                  Are you a <span>Resident?</span> <br>
                  
                </h1>
                <p>
                  Register now to access essential services and stay informed about community events! Your registration helps strengthen local governance and ensures you receive important updates. Join us in fostering a more connected and engaged barangay!
                </p>
                <div class="btn-box">
                  <a href="http://localhost/brgywashington/users/Register" class="btn1">
                    Sign Up
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container ">
          <div class="row">
            <div class="col-md-7 ">
              <div class="detail-box">
                <h1>
                  Get In <span>Touch</span> <br>
                  
                </h1>
                <p>
                  Connect with us! Use our 'Get in Touch' feature for quick and easy communication. Whether you have questions, feedback, or important matters to discuss, we're here for you. Strengthen the bond within our community through seamless and direct interaction.
                </p>
                <div class="btn-box">
                  <a href="contact.php" class="btn1">
                    Contact Us
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ol class="carousel-indicators">
      <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
      <li data-target="#customCarousel1" data-slide-to="1"></li>
      <li data-target="#customCarousel1" data-slide-to="2"></li>
    </ol>
  </div>
  <div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.7718196844926!2d125.48502177496948!3d9.785365126691296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x330136b7bf0035af%3A0x2931b445baf6785!2sWashington%20Barangay%20Hall%2C%20Ortiz%20Street%2C%20Surigao%20City%2C%20Surigao%20del%20Norte!5e0!3m2!1sen!2sph!4v1726725204784!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</section>
<!-- end slider section -->
</div>

<?php  include '../include/homepage/footer.php' ?>