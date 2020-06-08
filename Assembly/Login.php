<?php

$link = mysqli_connect('localhost', 'root', '', 'db_ing');

// Check connection
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
    echo "ciaoooo";
} 

session_start();

if(isset($_POST['email']) || isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = stripcslashes($email);
    $password = stripcslashes($password);

    $passmd5 = md5($password);

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $query = mysqli_query($link, "SELECT * FROM Utente where Mail = '$email' && Password = '$password'")
    or die("Query non eseguita!".mysqli_error($link));

    if($query){
        if(mysqli_num_rows($query) == 1){
            $row = mysqli_fetch_assoc($query);
            $_SESSION['nome'] = $row['Nome'];
            $_SESSION['cognome'] = $row['Cognome'];
            $_SESSION['email'] = $row['Mail'];
            $_SESSION['password'] = $row['Password'];
            header('Location: Homepage.php');
            exit();
        }else{
            echo '<script type="text/javascript">
            alert("Username o password non corretti. Premi OK per inserirli nuovamente");
            window.location= "Login.html"
            </script>';
        }
    }else{
        die("Query fallita!");
    }   
}
?>