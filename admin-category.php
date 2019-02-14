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



$q = "SELECT id,category FROM categories";


$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());


    
$data = '<html>
            <head>
                <link rel="stylesheet" href="feed.css">
            </head>
            <body>
                <div class="wrapper">
                <h1 style="text-align:center; padding: 30px 25px;"> EDIT OR DELETE Categories </h1>
                <table class="table" style="width:100%">
                  <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                    ';
if ($result = $conn->query($q)) {
/* fetch associative array */
while ($row = $result->fetch_assoc()) {
      $data .= '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["category"].'</td>
                    <td><a href="edit-category.php?oldcategory='.$row["category"].'"> EDIT </a> </td>
                    <td><a href="delete-category.php?category='.$row["category"].'"> DELETE </a> </td>
                </tr>
                ';
}   /* free result set */
     $result->free();
}
        $data.='</table>
                 
                <br/> 
                <br/>
                
                <hr>
                <br />
                
                <h1 style="text-align:center">CREATE NEW CATEGORY</h1>
                <form style="text-align:center" action="category-created.php" method="post">
                Category Name: <input type="text" name="category">
                <button class="sortvote">Create</button>
                </form>
                </div>
            </body>
        </html>';
    echo $data;
    
?>



            
        
        
<?php
    require_once("footer.php");
?>