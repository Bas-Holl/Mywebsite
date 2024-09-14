<?php
$target_dir = "uploads/";
$uploadOk = 1;
$error = "Select image to upload:";

$query = db()->prepare("SELECT * FROM projecten ORDER BY Jaar DESC");
$query->execute();


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if(empty($_FILES["fileToUpload"]["tmp_name"])){
    $check = false;
  } else {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  }
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $error = "File is not an image.";
    $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    $error = "Sorry, file already exists.";
    $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000000) {
    $error = "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk != 0) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      try{
        $project = $_POST['project']; 
        $afbeelding = "". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]))."";

        //stopt het in de database
        $query = db()->prepare("INSERT INTO uploads ( ProjectID, Afbeelding) 
        VALUES( :project, :afbeelding)");
        $query->execute(["project" => $project, "afbeelding" => $afbeelding]);

      } catch (PDOException $e){
          die ("Error!: ".$e->getMessage());
      }
      $error = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

    } else {
      $error = "Sorry, there was an error uploading your file.";
    }
  }
}




?>