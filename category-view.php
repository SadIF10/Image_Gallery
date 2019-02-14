
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


if (isset($_POST["sort"])) {
    $sort = $_POST["sort"];
} else {
    $sort = 1;
}

if (isset($_GET["category"])) {
    $category = $_GET["category"];
} else {
    $category = "nature";
}

if($sort != 1) {
    $q = "SELECT image_id,id,image,title,a,rating,votes,category FROM images where category='$category' AND approved=1 ORDER BY rating DESC";
} else {
    $q = "SELECT image_id,id,image,title,a,rating,votes,category FROM images where category='$category' AND approved=1 ORDER BY image_id DESC";
}


$conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());


    
$data = '<html>
            <head>
                <link rel="stylesheet" href="feed.css">
            </head>
            <body>
                <div class="wrapper">
                <h1 style="text-align:center; padding: 30px 25px;"> GLOBAL FEED </h1>
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
      $m = $row["id"];
      $q2 = "SELECT name FROM users WHERE id = $m";
      if ($result2 = $conn->query($q2)) {
            while ($row2 = $result2->fetch_assoc()) {
                $name2 = $row2["name"];
            }
      } else
        echo "problem";
      $data .= '<div class="card">
                    <img src="images/'.$row["image"].'">
                    <p class="title"><b>Title: '.$row["title"].'</b></p>
                    <p><b>Description: </b>'.$row["a"].'</p>
                    <p><b>Created by: </b>'.$name2.'</p>
                    <p><b>Category: </b><a href="#" style="text-decore:none">'.$row["category"].'</a></p>
                    <p><b>Rating: </b>'.$row["rating"].' ('.$row["votes"].' votes)</p>'
                    ;
                    if($_SESSION["id"] != $row["id"]) {
                        $data .= '<p><b>Rate it: </b><form action="voted.php" method="post">
                                        <select name="rating">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option></select>
                                            <input style="display:none" name="id" value="'.$row["image_id"].'">
                                            <button class="sortvote">Vote</button></form></p>
                        ';
                        
                    }
                    $data .='
                            </div>';
}   /* free result set */
    
     $result->free();
}
        $data.='
                <div class="clearfix"></div>
                 
                <br/> 
                
                </div>
            </body>
        </html>';
    echo $data;
    
?>


        
        
<?php
    require_once("footer.php");
?>
            
