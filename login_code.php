<?php
session_start();
    
    if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());
        $sql = ("SELECT email, password, active FROM users WHERE email='".$email."' AND password='".$password."' AND active>0") or die(mysql_error());

        $match  = mysqli_num_rows($conn->query($sql));

            if($match > 0){
                $query = ("SELECT id,name,email,password,hash,active FROM users WHERE email='".$email."' AND password='".$password."' AND active > 0");
                if ($result = $conn->query($query)) {
                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["name"] = $row["name"];
                        $_SESSION["email"] = $row["email"];
                        $_SESSION["password"] = $row["password"];
                        $_SESSION["hash"] = $row["hash"];
                        $_SESSION["active"] = $row["active"];
                    }

                    /* free result set */
                    $result->free();
                }
                header( "Location: dashboard.php" );
                
            }else{
                echo "Wrong credits";
            }
    } else {
        echo "there was an error";
    }
    
    
?>