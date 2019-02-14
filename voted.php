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

    if(!isset($_POST["rating"])) {
        echo '<h1>Thank you</h1>
        <p><a href="dashboard.php">Back to Dashboard</a></p>';
    } else {
        $vote = $_POST["rating"];
        $id = $_POST["id"];
        $q1 = "SELECT rating, votes FROM images WHERE image_id=$id";
        
        $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
        
        if ($result = $conn->query($q1)) {
            while ($row = $result->fetch_assoc()) {
                $oldrating = $row["rating"];
                $oldvote = $row["votes"];
                $newrating = (($oldrating * $oldvote) + $vote)/($oldvote + 1);
                $newvote = $oldvote + 1;
            }
        }
        
        $q2 = "UPDATE images SET rating='".$newrating."', votes='".$newvote."' WHERE image_id='".$id."'";
        if ($result = $conn->query($q2)) {
            echo '<h1>Thank you</h1>
                  <p><a href="dashboard.php">Back to Dashboard</a></p>';
        }
    }



?>

<?php
    require_once("footer.php");
?>