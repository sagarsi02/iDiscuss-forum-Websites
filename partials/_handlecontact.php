<?php
    $connection = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';
        $user_fname = $_POST['fname'];
        $user_lname = $_POST['lname'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if (!$conn) {
            die ("Sorry we fail to connect". mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO `contacts` (`user_fname`, `user_lname`, `email`, `subject`, `message`, `date`) VALUES ('$user_fname', '$user_lname', '$email', '$subject', '$message', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $connection = true;
                header("location: /forum/contact.php?ConnectionSuccess=true");
                exit;
            }
        }

    }
?>
