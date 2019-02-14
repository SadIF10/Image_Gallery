

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


if(isset($_POST["newcategory"])) {
        $oldcategory = $_POST["oldcategory"];
        $newcategory = $_POST["newcategory"];
        $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
        $q1 = "UPDATE images SET category='".$newcategory."' WHERE category='".$oldcategory."'";
        $q2 = "UPDATE categories SET category='".$newcategory."' WHERE category='".$oldcategory."'";
        $conn->query($q1);
        $conn->query($q2);
        echo "<html><p>updated</p><br /><a href='admin-dashboard.php'>Back to DashBoard</a></html>";
} else {
    echo "something went wrong";
}

?>


        
        
<?php
    require_once("footer.php");
?>