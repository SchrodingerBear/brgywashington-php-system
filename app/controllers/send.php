<?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__ . "/vendor/autoload.php";

// Infobip configuration
$base_url = "1gxpek.api.infobip.com";
$api_key = "3a05da7dc239383266d9b376d09a65a3-917b251a-65bc-4c31-b55f-69908fa170c0";
$configuration = new Configuration(host: $base_url, apiKey: $api_key);
$api = new SmsApi(config: $configuration);

// Connect to your database
$pdo = new PDO('mysql:host=your_host;dbname=your_database', 'your_username', 'your_password');

// Fetch contacts from the residents table
$query = $pdo->query("SELECT contact FROM residents");
$contacts = $query->fetchAll(PDO::FETCH_COLUMN);

$title = $_POST["title"];
$body = $_POST["body"]; // Message from form input

// Send SMS to each contact
foreach ($contacts as $number) {
    $message_content = "$title ',' $body";
    $destination = new SmsDestination(to: $number);
    $smsMessage = new SmsTextualMessage(
        destinations: [$destination],
        text: $message_content,
        from: "Brgy Cabugo"
    );
    $request = new SmsAdvancedTextualRequest(messages: [$smsMessage]);

    $response = $api->sendSmsMessage($request);
}

echo "Messages sent successfully.";
?>
