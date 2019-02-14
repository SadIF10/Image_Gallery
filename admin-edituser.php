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

<?php



$q = "SELECT id,name,email FROM users WHERE active=1";


$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());


    
$data = '<html>
            <head>
                <link rel="stylesheet" href="feed.css">
            </head>
            <body>
                <div class="wrapper">
                <h1 style="text-align:center; padding: 30px 25px;"> EDIT OR DELETE USERS </h1>
                <table class="table" style="width:100%">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                    <td>'.$row["id"].'</td>
                    <td>'.$row["name"].'</td>
                    <td>'.$row["email"].'</td>
                    <td><a href="admin-edituser_code.php?id='.$row["id"].'&name='.$row["name"].'&email='.$row["email"].'"> EDIT </a> </td>
                    <td><a href="admin-delete-user.php?id='.$row["id"].'" style="text-decoration:none"> DELETE </a> </td>
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