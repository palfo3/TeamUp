<?php

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['hashedPassword'];

echo "nome: ".$nome;
echo "<br>cognome: ".$cognome;
echo "<br>email: ".$email;
echo "<br>password hashed: ".$password;

?>