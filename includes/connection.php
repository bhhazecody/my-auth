<?php

error_reporting(0);

$link = mysqli_connect("localhost", "root", "", "smartcord");

if ($link === false) {
    die("Error with db...");
}

// Discord Bot
$client_id = "1026985021371863050";
$client_secret = "kd86ZjF1mMMS58LYdCa-jlhWMBnAVHYB";
$BotToken = "MTAyNjk4NTAyMTM3MTg2MzA1MA.GLsdGx.Po1Z_GjPy5zu5fXhn-ApW9BC1PTq3_KubLmU-8";

$redirect_uri = "https://restoresafe.w3spaces.com/auth/"; // AUTH
$verify_uri = "https://restoresafe.w3spaces.com/verify/";
$ShoppySecret = ""; // replace with your webhook secret
$shoppyApiKey = "";

// Webhooks
$AdminLogs = "";
$Logs = "";

?>