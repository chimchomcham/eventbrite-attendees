<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// The Eventbrite API is very well documented, so check it out.
// Specify the URL, or the API endpoint
// The number after events/ and before /attendees is the event ID.
$url = 'https://www.eventbriteapi.com/v3/events/51590828557/attendees/';

// $fields = array(
//   'secret' => $recaptcha_secret,
//   'response' => $_POST['g-recaptcha-response']
// );

// $fields_string = '';
// foreach ($fields as $key => $value) {
//   $fields_string .= $key.'='.$value.'&';
// }
// rtrim($fields_string, '&');

// curl_init() initalizes a cURL session.
$ch = curl_init();

// curl_setopt sets options for cURL transfers.
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, 0); // Specify whether it's a get or post request. 0 here specifies that it's a get request.
curl_setopt($ch,CURLOPT_HEADER, FALSE); // Forget what this does.
// Specify the OAuth crendentials here.
curl_setopt($ch,CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer YOUR_OAUTH_TOKEN',
    'Content-Type: application/json'
));
// curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

echo $response;
// $recaptcha_result = json_decode($response);

/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $headers = "From: webdev@soe.ucsd.edu";
    mail('c2yang@eng.ucsd.edu','EB Test',implode('',$_POST),$headers);
}
*/
?>
