<?php 
function uploadFile($mail, $file){
	include ('chiave.php');


	$conn = new mysqli($host, $user, $pwd, $datab);
	if($conn->connect_errno)die("impossibile connettersi al db:".$conn->connect_error());
	
	$target_dir = "../uploads/immagini/";
$target_file = $target_dir . basename($file["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($file["name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($file["tmp_name"], $target_file)) {
    echo "The file ". basename( $file["name"]). " has been uploaded.";
    include "../backend/db_utente.php";
	$utente = new db_utente();
	$utente->updateImmagine($mail, $target_file);
	$conn->close();

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}
	
	?>

	