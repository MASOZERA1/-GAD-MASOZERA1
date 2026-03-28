<?php
require_once('AfricasTalkingGateway.php');

$username = "YOUR_USERNAME";
$apikey = "YOUR_API_KEY";
$gateway = new AfricasTalkingGateway($username, $apikey);

$recipients = $_POST['phone'];
$message = $_POST['message'];

try {
  $results = $gateway->sendMessage($recipients, $message);
  foreach($results as $result){
    echo "Sent to ".$result->number." Status: ".$result->status."<br>";
  }
} catch (AfricasTalkingGatewayException $e){
  echo "Error: ".$e->getMessage();
}
?>