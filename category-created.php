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


$category = $_POST["category"];

$q = "INSERT INTO categories (category)
        VALUES ('$category')";


$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());


if ($result = $conn->query($q)) {
/* fetch associative array */
    echo "<html> <h1>CATEGORY CREATED</h1><br />
            <a href='admin-category.php'>BACK</a>
        </html>";
}


?>



            
        
        
<?php
    require_once("footer.php");
?>