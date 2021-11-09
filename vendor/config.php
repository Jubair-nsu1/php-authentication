<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1018309636995-303e6fg79ffacadapf18u4s7ciagfnsj.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://jubair-sample.herokuapp.com/index.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>
