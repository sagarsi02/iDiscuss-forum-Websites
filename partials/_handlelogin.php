<?php
$showError = "false";
$showpassError = "false";
$login = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST["loginemail"];
    $pass = $_POST["loginpassword"];

        $sql = "Select * from users where user_email='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            while ($row=mysqli_fetch_assoc($result)) {
                if (password_verify($pass, $row['user_pass'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_sno'] = $row['user_sno'];
                    $_SESSION['user_email'] = $email;
                    header("location: /forum/index.php?login=true");
                }
                else{
                    // $showError = "Invelid Credentials";
                    $showpassError = "password was wrong";
                    header("location: /forum/index.php?login=false&error=$showpassError");
                }
            }
            
        }
        else{
            $showError = "Email is not exist";
            header("location: /forum/index.php?email=false&error=$showError");
        }
}


?>