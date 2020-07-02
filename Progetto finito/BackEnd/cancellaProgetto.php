<?php
require "db_progetto.php";
$id = $_POST['id'];

$progetto = new db_progetto();
$progetto->delete($id);

?>