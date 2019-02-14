

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
        
    <div class="content">
            
        <form>
          <div class="container">
            <h1>DashBoard</h1>
            <p>Welcome to Image Gallery Management</p>
            <hr>
              
            <label for="name"><b>Name</b></label> <br>
            <lable> <?php echo $_SESSION["name"]; ?> </lable> <br>
              
            <label for="email"><b>Email</b></label> <br>
            <lable> <?php echo $_SESSION["email"]; ?> </lable> <br>
            
              
            <a href="edit.php">Edit</a>
          </div>

          <div class="container signin">
            <p><br /> <a href="feed.php"> Back to my feed</a>.</p>
          </div>
        </form>
        
        </div>
        
        
<?php
    require_once("footer.php");
?>
             
