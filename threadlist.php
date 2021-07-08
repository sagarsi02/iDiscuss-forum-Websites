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
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE categories_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['categories_name'];
        $catdesc = $row['categories_discription'];
    }
    ?>

    <?php
    $showAleart = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //Insert to the database
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<", "&lt", $th_title);
        $th_title = str_replace(">", "&gt", $th_title);

        $th_desc = str_replace("<", "&lt", $th_desc);
        $th_desc = str_replace(">", "&gt", $th_desc);


        $user_sno = $_POST['user_sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_time`) VALUES ('$th_title', '$th_desc', '$id', '$user_sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAleart = true;
        if ($showAleart) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your thread has been added please wait for community to respond.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your thread has been not added.... please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    ?>

    <div class="container my-4">
        <div class="jumbotron p-5" style="background: #e2ecea;">
            <h1 class="display-4">Welcome to the <?php echo $catname; ?> forums</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p class="mb-3">This is peer to peer this forums for sharing knowledge with each other. NoSpam / Advertising / Self-promote in the forums.Do not post copyright-infringing material.Do not post “offensive” posts, links or images.</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <div class="container" style="max-width: 900px;">
        <h2>Start a Discussion</h2>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">


            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                $loggedin = true;
            } else {
                $loggedin = false;
            }

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<div class="mb-3">
                        <label for="text" class="form-label">Question Title</label>
                            <input type="text" minlength="5" class="form-control" id="title" name="title"             aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">
                                Keep your title as short and crisp as possible.
                            </div>
                    </div>
                    <input type="hidden" name="user_sno" value="' . $_SESSION["user_sno"] . '">
                    <div class="form-group">
                        <label for="text" class="form-label">Elaborate your concern</label>
                        <textarea type="text" minlength="20" class="form-control" id="desc" name="desc"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success my-2">Submit</button>
                </form>';
            } else {
                echo '<div class="jumbotron jumbotron-fluid px-5 py-3 my-3" style="background: #e2ecea; max-width: 900px; margin: auto;">
                    <h1 class="display-5">Sorry you can not post your threads.</h1>
                    <p class="mb-3">Log in or sign up to leave a Question</p>
                    <a href="#" class="btn btn-danger my2 px-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    <a href="#" class="btn btn-danger my2 px-4" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</a>
                </div>';
            }

            ?>


    </div>

    <div class="container">
        <h2 class="py-2">Browse Question</h2>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $th_time = $row['thread_time'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users` WHERE user_sno=$thread_user_id";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            echo '<div class="media mb-2" style="display: flex; max-width: 830px; margin: auto;">
                            <img src="img/user.png" class="p-1" width="45px" height="40px" class="mr-3" alt="...">
                        <div class="media-body">
                                <h5 class="mt-0">
                                    <a href="thread.php?threadid=' . $id . '" class=" text-dark text-decoration-none">' . $title . '</a>
                                </h5>
                                <p class="my-0">' . $row2['user_email'] . ' at ' . $th_time . '</p>
                                <p style="margin-left: 20px;">' . $desc . '</p>
                        </div>
                    </div>';
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid px-5 py-3 my-3" style="background: #e2ecea; max-width: 900px; margin: auto;">
                <h1 class="display-5">No Threads Found</h1>
                <p class="lead"><?php echo $catdesc; ?></p>
                <p class="mb-3">Be the first person to ask a question.</p>
            </div>';
        }
        ?>
    </div>
    <nav aria-label="Page navigation example" class="my-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>


    <?php include 'partials/_footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

</body>

</html>