

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

        <div class = "content">
            <div class = "feed">
                <ul>
                    <li  style="padding: 40px 30px" class="admindba"> ADMIN DASHBOARD </li>
                    <hr>
                    <li style="padding: 20px 30px"><a class="admindba" href="admin-approve.php"> APPROVE IMAGES</a></li>
                    <li  style="padding: 20px 30px"><a class="admindba" href="admin-edituser.php"> EDIT USERS </a></li>
                    <li style="padding: 20px 30px"><a class="admindba" href="admin-editimage.php"> EDIT IMAGE </a></li>
                    <li style="padding: 20px 30px"><a class="admindba" href="admin-category.php"> ADD/EDIT CATEGORIES </a></li>
                </ul>
            </div>
        </div>
        
<?php
    require_once("footer.php");
?>
        