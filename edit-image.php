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
if(isset($_GET['data']) && !empty($_GET['data'])){
        // Verify data
        $data = $_GET['data'];
        echo '<html>

                <header>
                    <link rel="stylesheet" href="frontpage.css">
                </header>



                <body>
                    <form action="edit-image-code.php" method="post">
                      <div class="container">
                        <h1>EDIT IMAGE</h1>
                        <p>Please fill in the new info.</p>
                        <hr>

                        <label for="Title"><b>Title</b></label>
                        <input type="text" placeholder="Enter Title" name="name" required>

                        <label for="Description"><b>Description</b></label>
                        <input type="text" placeholder="Enter Description" name="description" required>
                        <div style="display: none"><input type="text" name="id" value='.$data.'></div>
                        <p><b>Select a category: </b>
                        <select name="category">
                          ';
                             $q = "SELECT id,category FROM categories";
                             $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());         
                             if ($result = $conn->query($q)) {
                                 /* fetch associative array */
                                 while ($row = $result->fetch_assoc()) {
                                     echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
                                 }
                             }
                          echo '
                        </select> <br></p>
                        <button type="submit" class="registerbtn">UPDATE</button>
                      </div>

                      <div class="container signin">
                        <p>Want to delete this image?<br /> <a href="delete.php?id='.$data.'">Delete</a>.</p>
                      </div>
                    </form> 
                </body>

            </html> 
    ';        
    }

?>

        
        
<?php
    require_once("footer.php");
?>