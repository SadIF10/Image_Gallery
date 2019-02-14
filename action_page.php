<?php
    session_start();
    if(isset($_SESSION["name"])) {
        require_once("header2.php");
    } else {
        require_once("header.php");
    }
    require_once("sidebar.php");


?>



<html>
<body>

    <h1  style="font-size:35px">Welcome <?php echo $_POST["name"]; ?></h1> <br>
    <p style="font-size:25px">Your email address is: <?php echo $_POST["email"]; ?></p> 
    <p style="font-size:25px">Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.</p><br>
    
    <?php
    print_r($_POST);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $hash = md5( rand(0,1000) );
    
        $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error()); // Connect to database server(localhost) with username and password.
        $sql = "INSERT INTO users (name, email, password, hash)
        VALUES ('$name', '$email', '$password','$hash')";
        
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error creating table: " . $conn->error;
        }
    
        $to      = $email; // Send email to our user
        $subject = 'Signup | Verification'; // Give the email a subject 
        $message = '

        Thanks for signing up!
        Your account has been created, you need to activated your account by pressing the url below.

        Please click this link to activate your account:
        localhost/task5/verify.php?email='.$email.'&hash='.$hash.'

        ';

        $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
        
    
    $click = "verify.php?email=$email&hash=$hash";
        
    echo '<html>
            <a style="font-size: 25px;" href='.$click.'>CLICK TO VERIFY</a>
        </html>';
    ?>
    
</body> 
</html>


        
        
<?php
    require_once("footer.php");
?>
