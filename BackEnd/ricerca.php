
<?php
//require 'db_progetto.php'
require 'db_progetto.php';

$progetto = new progetto($_POST);
$db_progetto = new db_progetto();
$db_progetto->ricercaProgetto('scialare');
echo $db_progetto->getProgetto()->print();

?>