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
    $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $id = $_POST["id"];
    $q ="UPDATE users SET name='".$name."',email='".$email."',password='".$password."' WHERE id='".$id."' AND active='1'";
    $conn->query($q);
?>

<html>
    <body style="font-size: 30px">
        Updated <br />
        <a href="admin-edituser.php">Back to Userlist</a>
    </body>

</html>


        
        
<?php
    require_once("footer.php");
?>