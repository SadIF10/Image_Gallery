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

if (isset($_POST["sort"])) {
    $sort = $_POST["sort"];
} else {
    $sort = 1;
}

$id = $_SESSION["id"];
$name = $_SESSION["name"];

if($sort != 1) {
    $q = "SELECT image_id,id,image,title,a,category,rating,votes FROM images WHERE id = $id AND approved=1 ORDER BY rating DESC";
} else {
    $q = "SELECT image_id,id,image,title,a,category,rating,votes FROM images WHERE id = $id AND approved=1 ORDER BY image_id DESC";
}


$name = $_SESSION["name"];

$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());

$data = '<html>
            <head>
                <link rel="stylesheet" href="feed.css">
            </head>
            <body>
                <div class="wrapper">
                    <h1 style="text-align:center; padding: 30px 25px;"> Feed of '.$name.' </h1>
                    <br />
                <p style="text-align:center;"> SORT BY <form style="text-align:center" action="#" method="post">
                            <select name="sort">
                                <option value=1>Most Recent</option>
                                <option value=2>Most Rated</option>
                            </select> <button class="sortvote">Sort</button></form></p>
                <hr style="margin: 60px 0px;">
                <br />
                    ';
if ($result = $conn->query($q)) {
/* fetch associative array */
while ($row = $result->fetch_assoc()) {
      $data .= '<div class="card">
                    <img src="images/'.$row["image"].'">
                    <p class="title"><b>Title: '.$row["title"].'</b></p>
                    <p><b>Description: </b>'.$row["a"].'</p>
                    <p><b>Created by: </b>'.$name.'</p>
                    <p><b>Category: </b><a href="category-view.php?category='.$row["category"].'" style="text-decore:none">'.$row["category"].'</a></p>
                    <p><b>Rating: </b>'.$row["rating"].' ('.$row["votes"].' votes)</p>
                    <p><a href="edit-image.php?data='.$row["image_id"].'">EDIT</a></p>
                </div>';
}   /* free result set */
     $result->free();
}
        $data.='<div class="clearfix"></div>
                 
                <br/> 
                
                </div>
            </body>
        </html>';
    echo $data;
    
?>


        
        
<?php
    require_once("footer.php");
?>
            
