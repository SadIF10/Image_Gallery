<?php
    session_start();
    if(isset($_SESSION["name"])) {
        require_once("header2.php");
    } else {
        require_once("header.php");
    }
    require_once("sidebar.php");
require_once("sidebar.php");

if($_SESSION["active"] < 3) {
    header( "Location: dashboard.php" );
}
    if(!isset($_SESSION["id"])) {
        header( "Location: login.php" );
    }

?>

<?php
    $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
    

    $newname = $_POST['name'];
    $newdesc = $_POST['description'];
    $id = $_POST['id'];
    $category = $_POST['category'];
    $q ="UPDATE images SET title='".$newname."', a='".$newdesc."', category='".$category."' WHERE image_id='".$id."'";
    $conn->query($q);

    if($conn->query($q)) {
        echo "UPDATED
            <html>
            <a href='feed.php'>GO BACK</a>
            </html>";
    }
    if(!isset($_SESSION["id"])) {
        header( "Location: login.php" );
    }
?>


        
        
<?php
    require_once("footer.php");
?>