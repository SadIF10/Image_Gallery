<?php
    session_start();
    if(isset($_SESSION["name"])) {
        require_once("header2.php");
    } else {
        require_once("header.php");
    }
    require_once("sidebar.php");

    if(!isset($_SESSION["id"])) {
        header( "Location: login.php" );
    }

?>


<?php
$id = $_GET["id"];
$user = $_SESSION["id"];

$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
$q ="DELETE FROM images WHERE image_id=".$id.";";

$getid = "SELECT id FROM images WHERE image_id = $id";

if ($result = $conn->query($getid)) {
/* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $check =$row["id"];
    }
}



if ($check == $user) {
    $conn->query($q);
    echo "";
    echo "<html><p>deleted</p><br /><a href='feed.php'>Back to Feed</a></html>";
} else if ($_SESSION["id"]>3){
    $conn->query($q);
    echo "";
    echo "<html><p>deleted</p><br /><a href='admin-editimage.php'>Back to DashBoard</a></html>";
}else {
    echo "not your image";
}




?>


        
        
<?php
    require_once("footer.php");
?>