<?php

if(!isset($_SESSION)){
	session_start();
} else {
	header('Location: index.php');
}

session_destroy();

header('Location: index.php');
?>