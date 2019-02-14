

<?php
    session_start();
    if(isset($_SESSION["name"])) {
        require_once("header2.php");
    } else {
        require_once("header.php");
    }
    require_once("sidebar.php");

if($_SESSION["active"] < 3) {
    header( "Location: dashboard.php" );
}
    if(!isset($_SESSION["id"])) {
        header( "Location: login.php" );
    }

?>


<?php
$id = $_GET["id"];

$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
$q ="DELETE FROM users WHERE id=".$id.";";

    $conn->query($q);
    echo "<html><p>deleted</p><br /><a href='admin-edituser.php'>Back to DashBoard</a></html>";




?>


        
        
<?php
    require_once("footer.php");
?>