<?php

require_once 'vendor/autoload.php';

$google_client = new Google_client();

$google_client->setClientId('953839603005-j6b0j5flahopjnb72n39chicm0r17dqg.apps.googleusercontent.com');

$google_client->setClientSecret('nvgtNsxqMWgCLlW5TtVK9Fy-');

$google_client->setRedirectUri('http://localhost/project/TeamUp/Assembly/index.php');

$google_client->addScope('email');

$google_client->addScope('profile');

session_start();

?>