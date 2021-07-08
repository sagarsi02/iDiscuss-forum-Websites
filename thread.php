<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>iDiscuss</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_navbar.php'; ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $ressult = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($ressult)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        // Query the users table to find out the name of OP
        $sql2 = "SELECT user_email FROM `users` WHERE user_sno=$thread_user_id";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
    }
    ?>

<?php
    $showAleart = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //Insert to the comment table
        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt", $comment);
        $comment = str_replace(">", "&gt", $comment);
        $user_sno = $_POST['user_sno'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `common_time`, `comment_by`) VALUES ('$comment', '$id', current_timestamp(), '$user_sno')";
        $ressult = mysqli_query($conn, $sql);
        $showAleart = true;
    }
    ?>

<?php
        if ($showAleart) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your comment has been added Successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        ?>

    <div class="container my-4">
        <div class="jumbotron p-5" style="background: #e2ecea;">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p class="mb-3">This is peer to peer this forums for sharing knowledge with each other. NoSpam / Advertising / Self-promote in the forums.Do not post copyright-infringing material.Do not post “offensive” posts, links or images.</p>
            <p class="lead">
            <p>posted by: <em><?php echo $posted_by; ?></em></p>
            </p>
        </div>
    </div>


    <div class="container" style="max-width: 900px;">
        <h2>Post a comment</h2>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
        <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                $loggedin = true;
                }
                else{
                $loggedin = false;
                }
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {                   
                        echo '<div class="form-group">
                            <label for="text" class="form-label">Type your comments</label>
                            <textarea type="text" minlength="5" class="form-control" id="comment" name="comment"></textarea>
                            <input type="hidden" name="user_sno" value="'. $_SESSION["user_sno"]. '">
                        </div>
                        <button type="submit" class="btn btn-success my-2">Post Commnet</button>
                    </form>';
                }
                else{
                    echo '<div class="jumbotron jumbotron-fluid px-5 py-3 my-3" style="background: #e2ecea; max-width: 900px; margin: auto;">
                <h1 class="display-5">Sorry you can not post a comment.</h1>
                <p class="mb-3">Log in or sign up to leave a comment</p>
                <a href="#" class="btn btn-danger my2 px-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                <a href="#" class="btn btn-danger my2 px-4" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</a>
                </div>';
                }
        ?>

    </div>


    <div class="container">
        <h2 class="py-2">Discussion</h2>

        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $ressult = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($ressult)) {
            $noresult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['common_time'];
            $thread_user_id = $row['comment_by'];
            $sql2 = "SELECT user_email FROM `users` WHERE user_sno=$thread_user_id";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);


            echo '<div class="media mb-2" style="display: flex; max-width: 830px; margin: auto;">
                        <img src="img/user.png" class="p-1" width="45px" height="40px" class="mr-3" alt="...">
                        <div class="media-body">
                        <p class="font-weight-bold my-0"><b>'.$row2['user_email'].'</b></p>
                        <p class="my-0">Posted Date: ' . $comment_time . '</p>
                            <p style="margin-left: 20px;">' . $content . '</p>
                        </div>
                    </div>';
        }
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid px-5 py-3 my-3" style="background: #e2ecea; max-width: 900px; margin: auto;">
                <h1 class="display-5">No Threads Solution Found</h1>
                <p class="mb-3">Sorry to inconvienience please wait to respond our community.</p>
            </div>';
        }
        ?>

    </div>






    <?php include 'partials/_footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>