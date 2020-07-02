<?php

include "Config.php";

$google_client->revokeToken();

session_destroy();

header('location: ../Google%20Access/Test/Login.html');

?>