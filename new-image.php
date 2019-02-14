
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
<body>

<form class="formm" action="upload.php" method="post" enctype="multipart/form-data">
    <p>Select image to upload:
    <input type="file" name="file" id="file"> </p><br>
    <p>Give it a title: 
    <input type="text" name="title" id="title"> </p><br>
    <p>What this image is about?: 
    <input type="text" name="description" id="description"> </p><br>
    <p>Select a category: 
    <select name="category">
      <?php
         $q = "SELECT id,category FROM categories";
         $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());         
         if ($result = $conn->query($q)) {
             /* fetch associative array */
             while ($row = $result->fetch_assoc()) {
                 echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
             }
         }
         ?>
    </select> <br></p>
    <input type="submit" value="Upload Image" name="submit">  <br>
</form>

</body>
</html>



        
        
<?php
    require_once("footer.php");
?>