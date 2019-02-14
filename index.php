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
        <form action="action_page.php" method="post">
          <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
              
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required> <br>
              
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required> <br>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required> <br>


            <p>By creating an account you agree to our <a href="#">Terms &amp; Privacy</a>.</p>
            <button type="submit" class="registerbtn">Register</button>
          </div>

          <div class="container signin">
            <p>Already have an account?<br /> <a href="login.php">Sign in</a>.</p>
          </div>
        </form> 
    </body>

</html>



        
        
<?php
    require_once("footer.php");
?>