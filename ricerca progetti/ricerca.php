<?php

require "..\BackEnd\db_progetto.php";



$progetti = new db_progetto();

$array = $progetti->getArrayProgetti("");

$array

?>