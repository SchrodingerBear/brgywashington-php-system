<?php
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__ . "/vendor/autoload.php";

// Infobip configuration
$base_url = "1gxpek.api.infobip.com";
$api_key = "your_api_key";  // Replace with your actual Infobip API key
$configuration = new Configuration(host: $base_url, apiKey: $api_key);
$api = new SmsApi(config: $configuration);

// Database connection
try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_barangay', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<script>Swal.fire('Error', 'Database connection failed: {$e->getMessage()}', 'error');</script>";
    exit();
}

// Fetch contacts from the residents table
$query = $pdo->query("SELECT contact FROM residents WHERE contact IS NOT NULL");
$contacts = $query->fetchAll(PDO::FETCH_COLUMN);

$title = $_POST["title"];
$body = $_POST["body"];
$message_content = "$title: $body";

// Send SMS to each contact
$sendSuccess = true;

foreach ($contacts as $number) {
    try {
        $destination = new SmsDestination(to: $number);
        $smsMessage = new SmsTextualMessage(
            destinations: [$destination],
            text: $message_content,
            from: "Brgy Cabugo"
        );
        $request = new SmsAdvancedTextualRequest(messages: [$smsMessage]);
        
        $response = $api->sendSmsMessage($request);

    } catch (Exception $e) {
        $sendSuccess = false;
        echo "<script>Swal.fire('Error', 'Failed to send SMS to some recipients: {$e->getMessage()}', 'error');</script>";
    }
}

// SweetAlert notification after sending SMS
if ($sendSuccess) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Messages Sent Successfully',
            text: 'All SMS messages have been sent.',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = '" . URLROOT . "/posts/manage_members.php';
        });
    </script>";
}
?>
