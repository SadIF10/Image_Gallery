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

<html>

    <header>
        <link rel="stylesheet" href="frontpage.css">
    </header>
    
    
    
    <body>
        <form action="update.php" method="post">
          <div class="container">
            <h1>EDIT</h1>
            <p>Please fill in your updated data</p>
            <hr>
              
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder=" <?php echo $_SESSION["name"]; ?> " value="<?php echo $_SESSION["name"]; ?>" name="name" required>
              
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder=" <?php echo $_SESSION["email"]; ?> " value="<?php echo $_SESSION["email"]; ?>" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="***" name="password" required>

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