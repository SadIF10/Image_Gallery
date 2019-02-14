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


$q = "SELECT image_id,id,image,title,a,category FROM images WHERE approved=0";


$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());


    
$data = '<html>
            <head>
                <link rel="stylesheet" href="feed.css">
            </head>
            <body>
                <div class="wrapper">
                <h1 style="text-align:center; padding: 30px 25px;"> APPROVE OR DELETE PENDING IMAGES </h1>
                <table class="table" style="width:100%">
                  <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Uploader</th>
                    <th>Action</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>
                    ';
if ($result = $conn->query($q)) {
/* fetch associative array */
while ($row = $result->fetch_assoc()) {
      $m = $row["id"];
      $q2 = "SELECT name FROM users WHERE id = $m";
      if ($result2 = $conn->query($q2)) {
            while ($row2 = $result2->fetch_assoc()) {
                $name2 = $row2["name"];
            }
      } else
        echo "problem";
      $data .= '
                <tr>
                    <td><img style="width:80px; height:80px;" src="images/'.$row["image"].'"> </td>
                    <td>'.$row["title"].'</td>
                    <td>'.$row["a"].'</td>
                    <td><a href="#" style="text-decoration:none">'.$row["category"].'</a> </td>
                    <td>'.$name2.'</td>
                    <td><a href="approve-image.php?id='.$row["image_id"].'">APPROVE</a> </td>
                    <td><a href="delete.php?id='.$row["image_id"].'">DELETE</a> </td> 
                    <td><a href="edit-image.php?data='.$row["image_id"].'">EDIT</a> </td>
                </tr>
                ';
}   /* free result set */
     $result->free();
}
        $data.='</table>
                 
                <br/> 
                
                </div>
            </body>
        </html>';
    echo $data;
    
?>

        
        
<?php
    require_once("footer.php");
?>

            
