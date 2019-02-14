<?php
    session_start();
    if(isset($_SESSION["name"])) {
        require_once("header2.php");
    } else {
        require_once("header.php");
    }
    require_once("sidebar.php");

?>

<?php

if($_SESSION["active"] < 3) {
    header( "Location: dashboard.php" );
}


if(!isset($_SESSION["id"])) {
    header( "Location: login.php" );
}


$id = $_GET["id"];
$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
$q ="UPDATE images SET approved=0 WHERE image_id='".$id."'";
    $conn->query($q);

    if($conn->query($q)) {
        echo "Disapproved
            <html>
            <a href='admin-editimage.php'>GO BACK</a>
            </html>";
    }

?>


        
        
<?php
    require_once("footer.php");
?>