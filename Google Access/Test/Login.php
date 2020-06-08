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

if(isset($_POST['mail']) || isset($_POST['password'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $email = stripcslashes($email);
    $password = stripcslashes($password);

    $passmd5 = md5($password);

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $query = mysqli_query($link, "SELECT * FROM Utente where mail = '$,mail' && Password = '$password'")
    or die("Query non eseguita!".mysqli_error($link));

    if($query){
        if(mysqli_num_rows($query) == 1){
            $row = mysqli_fetch_assoc($query);
            $_SESSION['email'] = $row['mail'];
            $_SESSION['password'] = $row['password'];
            header('Location: Profilo.html');
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