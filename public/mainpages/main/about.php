<?php
// Include database connection
include('connection.php');

// Fetch logo from the database
$sql = "SELECT brgy_name, pic_logo, about, mobile_number, address, email FROM brgy_detail LIMIT 1";
$result = mysqli_query($con, $sql);

$logo = '';
$mobile_number = '';
$address = '';
$brgy_name = '';
$about = '';
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Construct absolute URL for the logo
    $logo = 'http://localhost/brgywashington/public/img/' . $row['pic_logo'];
    $mobile_number = $row['mobile_number'];
    $email = $row['email'];
    $address = $row['address'];
    $brgy_name = $row['brgy_name'];
    $about = $row['about'];
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
if (empty($about)) {
  $brgy_name = 'Not Available';
}

?>




<?php  include '../include/homepage/navbar.php' ?>
<!-- about section -->

<section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Ab<span>out</span>
              </h2>
              <p>
            <?php echo htmlspecialchars($about); ?>
            </p>    
            </div>
               
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
              <img src=<?php echo htmlspecialchars($logo); ?> alt="">
              <a href="officials.php"><button class="img-button">View Officials</button></a>
          </div>
      </div>
      <!-- Hidden div to show on button click -->
<div class="overlay"></div>

      </div>
    </div>
    <div id="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.7718196844926!2d125.48502177496948!3d9.785365126691296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x330136b7bf0035af%3A0x2931b445baf6785!2sWashington%20Barangay%20Hall%2C%20Ortiz%20Street%2C%20Surigao%20City%2C%20Surigao%20del%20Norte!5e0!3m2!1sen!2sph!4v1726725204784!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  </section>

  <!-- end about section -->
  <?php  include '../include/homepage/footer.php' ?>