

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
$category = $_GET["category"];

$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
$q1 = "UPDATE images SET category='uncategorized' WHERE category='".$category."'";
$q2 = "DELETE FROM categories WHERE category='".$category."'";


    $conn->query($q1);
    $conn->query($q2);
    echo "<html><p>deleted</p><br /><a href='admin-dashboard.php'>Back to DashBoard</a></html>";

?>


        
        
<?php
    require_once("footer.php");
?>