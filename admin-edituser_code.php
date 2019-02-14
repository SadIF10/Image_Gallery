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


<html>

    <header>
        <link rel="stylesheet" href="frontpage.css">
    </header>
    
    
    
    <body>
        <form action="update-admin.php" method="post">
          <div class="container">
            <h1>EDIT</h1>
            <p>Please fill in your updated data</p>
            <hr>
              
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="<?php echo $_GET['name']; ?>" value="<?php echo $_GET['name']; ?>" name="name" required>
              
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="<?php echo $_GET['email']; ?>" value="<?php echo $_GET['email']; ?>" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="***" name="password" required>
            
            <input type="text" name="id" value='<?php echo $_GET["id"]; ?>' style="display: none">
            <button type="submit" class="registerbtn">Update</button>
          </div>

          <div class="container signin">
            <p><br /> <a href="feed.php"> Back to my feed</a>.</p>
          </div>
        </form> 
    </body>

</html>


        
        
<?php
    require_once("footer.php");
?>