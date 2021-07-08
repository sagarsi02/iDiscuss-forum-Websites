<?php
$showError = "false";
$showpassError = "false";
$showAlert = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST["signupemail"];
    $user_password = $_POST["signuppassword"];
    $user_cpassword = $_POST["signupcpassword"];
    // $exists=false;

    //Check whether this username Exists
    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Email Already in use";
    }
    else {

        if (($user_password == $user_cpassword)) {
            $hash = password_hash($user_password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `user_date`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("location: /forum/index.php?signupsuccess=true");
                exit();
            }
        } 
        else {
            $showpassError = "Passwords do not match";
            header("location: /forum/index.php?password=false&error=$showpassError");
            exit;

        }
    }
    header("location: /forum/index.php?signupsuccess=false&error=$showError");

}

?>
