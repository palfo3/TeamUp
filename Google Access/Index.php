<?php

include "Config.php";

$login_btn = '';

if(isset($_GET["code"])){

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if(!isset($token['error'])){

        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        //isset: Determina se una variabile è dichiarata ed è diversa da NULL 
        if(!isset($data['given_name'])){
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if(!isset($data['family_name'])){
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if(!isset($data['email'])){
            $_SESSION['user_email_address'] = $data['email'];
        }

        if(!isset($data['gender'])){
            $_SESSION['user_gender'] = $data['gender'];
        }

        if(!isset($data['picture'])){
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

if(!isset($_SESSION['access_token'])){

    $login_btn = '<a href = "'.$google_client->createAuthUrl().'"><img src = "Sign_In.png"/></a>';
}

?>

<html>
<head>
    <title></title>
</head>
<body>

    <div class = "container">
        <br>
        <h2 align = "center"> PHP Login using Google Account
        </h2>
        <br>
        <div class = "panel panel-default">

            <?php

            if($login_btn == ''){

                echo  '<div class = "panel-heading"> Welcome User </div> <div class = "panel-body">';

                echo  '<img src"'.$_SESSION["user_image"].'"class = "img-responsive img-circle img-thumbnail" />';

                echo  '<h3><b> Name: </b>'.$_SESSION["user_first_name"].''.$_SESSION["user_last_name"].'</h3';

                echo  '<h3><b> Email: </b>'.$_SESSION["user_email_address"].'</h3>';

                echo  '<h3><a href = "Logout.php"> Logout </h3></div>';
            }else{

                echo '<div align = "center">'.$login_btn.'</div';
            }

            ?>

        </div>
    </div>
</body>
</html>