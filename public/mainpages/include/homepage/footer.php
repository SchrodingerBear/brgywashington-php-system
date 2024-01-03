<?php
// Include database connection
include('connection.php');

// Fetch logo from the database
$sql = "SELECT brgy_name, tagline, pic_logo, mobile_number, province, municipality, address, email FROM brgy_detail LIMIT 1";
$result = mysqli_query($con, $sql);

$logo = '';
$mobile_number = '';
$address = '';
$brgy_name = '';
$tagline = '';
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
    $tagline = $row['tagline'];
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
if (empty($brgy_name)) {
  $brgy_name = '';
}
if (empty($province)) {
  $province = '';
}
if (empty($municipality)) {
  $municipality = '';
}

?>




<section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="#" onclick="toggleMap(event)">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>Brgy. <?php echo htmlspecialchars($brgy_name); ?>, <?php echo htmlspecialchars($municipality); ?>, <?php echo htmlspecialchars($province); ?></span>
            </a>
            
              <a href="tek:09859691310">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call <?php echo htmlspecialchars($mobile_number); ?>
                </span>
              </a>
              <a href="mailto:brgywashingtonsec@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                <?php echo htmlspecialchars($email); ?>
                </span>
              </a>
            </div>
          </div>
         
          <div class="info_social">
            <a href="https://www.facebook.com/SKsaWASHINGTON">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              From community updates to key resources, stay informed and engaged. Your go-to source for all things barangay-related, conveniently available at your fingertips.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="active" href="index.php">
                <img src="images/nav-bullet.png" alt="">
                Home
              </a>
              <a class="" href="about.php">
                <img src="images/nav-bullet.png" alt="">
                About
              </a>
              <a class="" href="services.php">
                <img src="images/nav-bullet.png" alt="">
                Services
              </a>

              <a class="" href="contact.php">
                <img src="images/nav-bullet.png" alt="">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 inf_col ">
        <div class="center">
    <h5>
      <span style="color:#fff;"><span style="color:#42cc5d; font-weight: 900;font-size: 25px"><?php echo htmlspecialchars($tagline); ?></span>
    </h5>
    
  </div>
        </div>
        
      </div>
      
    </div>
    <p  class="foot">&copy; <span id="year"></span> SPUS BARRIOVISTA. All Rights Reserved.</p>
  </section>

<style>
  .center {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100px; 
  }

  .center h5 {
    font-size: 20px; 
    line-height: 1.5;
    margin-bottom: -6.5rem;
  }

  .foot  {
    margin-top: 5rem;
    font-size: 13px;
    color: white;
    align-items: center;
    text-align: center;
  }
</style>

<script>
  
  document.getElementById('year').textContent = new Date().getFullYear();
</script>




<!-- jQery -->
<script type="text/javascript" src="../js/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="../js/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="../js/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
  <script>
    function toggleMap(event) {
        event.preventDefault(); // Prevent default anchor behavior
        const map = document.getElementById('map');
        if (map.classList.contains('show')) {
            // If showing, hide it
            map.classList.remove('show');
            setTimeout(() => {
                map.style.visibility = 'hidden'; // Hide after transition
            }, 500); // Match the transition duration
        } else {
            // If hidden, show it
            map.style.visibility = 'visible'; // Show immediately
            map.classList.add('show'); // Add class to fade in
        }
    }

    
</script>
</body>

</html>