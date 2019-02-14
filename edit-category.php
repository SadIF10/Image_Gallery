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


$oldcategory = $_GET["oldcategory"];

?>


<html>
    <body>
        <h1>RENAME CATEGORY: <?php echo $oldcategory ?></h1>
        <form action="edit-category-code.php" method="post">
            <input type="text" name="newcategory">
            <input type="text" name="oldcategory" value="<?php echo $oldcategory ?>" style="display:none">
            <button class="sortvote">Confirm</button>
        </form>
    </body>
</html>


        
        
<?php
    require_once("footer.php");
?>