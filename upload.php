<?php

session_start();

    if(!isset($_SESSION["id"])) {
        header( "Location: login.php" );
    }
$id = $_SESSION["id"];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
 
        // Gather all required data
        $title = $_POST["title"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $x = $_FILES["file"]["name"];
        
        // Create the SQL query
        $sql = "INSERT INTO images (id, image, title, a, category)
        VALUES ('$id', '$x', '$title', '$description','$category')";

        print_r($sql);
        // Execute the query
        $result = $conn->query($sql);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
    header( "Location: dashboard.php" );
}


#header( "refresh:1;url=feed.php" );

?>




        
        
<?php
    require_once("footer.php");
?>














