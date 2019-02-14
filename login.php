
<?php
    session_start();
    if(isset($_SESSION["name"])) {
        require_once("header2.php");
    } else {
        require_once("header.php");
    }
    require_once("sidebar.php");

?>



<html>

    <header>
        <link rel="stylesheet" href="frontpage.css">
    </header>
    
    
    
    <body>
        <form action="login_code.php" method="post">
          <div class="container">
            <h1>Login</h1>
            <p>Please fill in your login details.</p>
            <hr>
              
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit" class="registerbtn">Login</button>
          </div>

          <div class="container signin">
            <p>Don't have an account?<br /> <a href="index.php">Sign Up</a>.</p>
          </div>
        </form> 
    </body>

</html>


        
        
<?php
    require_once("footer.php");
?>