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
    $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        // Verify data
        $email = $_GET['email']; // Set email variable
        $hash = $_GET['hash']; // Set hash variable
        $sql = ("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        
        $match  = mysqli_num_rows($conn->query($sql));
        
        if($match > 0){
            $q ="UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
            $conn->query($q);
            echo '<html><a href="login.php" style="text-align:center"> VARIFIED. PLEASE LOGIN HERE</a></html>';
        }else{
            echo "Wrong credits";
        }
    }
?>


        
        
<?php
    require_once("footer.php");
?>