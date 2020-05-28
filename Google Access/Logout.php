<?php

include "Config.php";

$google_client->revokeToken();

session_destroy();

header('location: Index.php');

?>