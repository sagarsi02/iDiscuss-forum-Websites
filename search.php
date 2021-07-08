<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .searchResults {
            max-width: 900px;
            margin: auto;
            margin-top: 7px;
        }
        .container{
            min-height: 84.5vh;
        }
    </style>
</head>


<body>
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


        <div class="container">
            <h2 class="my-3">Search Results: <em class="text-secondary">"<?php echo $_GET['query']; ?>"</em></h2>
            <div class="result my-3">

                <?php
                    $showAlert = false;
                    $query = $_GET['query'];
                    $sql = "SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) against('$query')";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $showAlert = true;
                        $title = $row['thread_title'];
                        $desc = $row['thread_desc'];
                        $thread_id = $row['thread_id'];
                        $url = "thread.php?threadid=". $thread_id;

                        echo '<div class="searchResults">
                                <h4> <a href="'.$url.'" class="text-dark">'. $title .'</a></h4>
                                <p class="my-0">'. $desc .'</p>
                            </div>';
                    }
                    if(!$showAlert){
                        echo '<div class="jumbotron jumbotron-fluid px-5 py-3 my-3" style="background: #e2ecea; max-width: 900px; margin: auto;">
                                <h1 class="display-5">No Search Result Found</h1>
                                Suggestions:
                                    <ul>
                                        <li>Make sure that all words are spelled correctly.</li>
                                        <li>Try different keywords.</li>
                                        <li>Try more general keywords.</li>
                                    </ul>
                            </div>';
                    }
                ?>

            </div>
        </div>





        <?php include 'partials/_footer.php'; ?>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    </body>

    </html>
</body>

</html>