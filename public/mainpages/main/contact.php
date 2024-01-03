<?php  include '../include/homepage/navbar.php' ?>

<!-- contact section -->
<section class="contact_section layout_padding-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="heading_container">
            <h2>
              Contact Us
            </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="form_container">
          <form action="send_email.php" method="POST">
      <div>
        <input type="text" name="name" placeholder="Your Name" required />
      </div>
      <div>
        <input type="text" name="phone" placeholder="Phone Number" required />
      </div>
      <div>
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div>
        <input type="text" name="message" class="message-box" placeholder="Message" required />
      </div>
      <div class="btn_box">
        <button type="submit">SEND</button>
      </div>
    </form>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map">
              <div id="googleMap">
                <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.7718196844926!2d125.48502177496948!3d9.785365126691296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x330136b7bf0035af%3A0x2931b445baf6785!2sWashington%20Barangay%20Hall%2C%20Ortiz%20Street%2C%20Surigao%20City%2C%20Surigao%20del%20Norte!5e0!3m2!1sen!2sph!4v1726725204784!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.7718196844926!2d125.48502177496948!3d9.785365126691296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x330136b7bf0035af%3A0x2931b445baf6785!2sWashington%20Barangay%20Hall%2C%20Ortiz%20Street%2C%20Surigao%20City%2C%20Surigao%20del%20Norte!5e0!3m2!1sen!2sph!4v1726725204784!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  </section>
  <!-- end contact section -->

  <div class="message">
    <?php
      // PHP script to handle form submission and send email
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Collect and sanitize form data
          $name = htmlspecialchars($_POST['name']);
          $phone = htmlspecialchars($_POST['phone']);
          $email = htmlspecialchars($_POST['email']);
          $message = htmlspecialchars($_POST['message']);

          // Recipient email address (your Gmail address)
          $to = "your-email@gmail.com";  // Replace with your Gmail address
          $subject = "New Message from Website Contact Form";

          // Build the email content
          $body = "You have received a new message from your website contact form.\n\n";
          $body .= "Name: " . $name . "\n";
          $body .= "Phone: " . $phone . "\n";
          $body .= "Email: " . $email . "\n\n";
          $body .= "Message:\n" . $message;

          // Set email headers
          $headers = "From: " . $email . "\r\n";
          $headers .= "Reply-To: " . $email . "\r\n";
          $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

          // Send the email
          if (mail($to, $subject, $body, $headers)) {
              echo "<p>Message sent successfully! Thank you for contacting us.</p>";
          } else {
              echo "<p>Sorry, something went wrong and we couldn't send your message. Please try again later.</p>";
          }
      }
    ?>
  </div>


  <?php  include '../include/homepage/footer.php' ?>

