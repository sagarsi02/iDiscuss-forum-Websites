<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <div class="container my-4" style="min-height: 80vh;">
            <h2>iDiscuss - About Us</h2>
            <div class="about m-auto my-4" style="max-width: 900px;">
                <h4>iDiscuss</h4>
                <p class="mx-4">iDiscuss is a forum website where anyone having problems related to development can post their problems and can find it answer. Let us tell you that this answer is not given by iDiscuss, but users like you who know the answer of any question can give the answer.</p>
                <div class="category">
                    <h4>Category</h4>
                    <p class="mx-4">The question is related to these categories, here you can see the category below.</p>
                    <ul>
                        <?php
                        $sql = "SELECT categories_name, categories_id FROM `categories` LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li><a class="dropdown-item" href="threadlist.php?catid=' . $row['categories_id'] . '">' . $row['categories_name'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="develope">
                    <h4 class="mt-4">Develop by</h4>
                    <div class="row align-items-lg-center">
                    <div class="col-100 col-md-4 order-md-2 col-lg-5">
                            <img src="img/author.jpg" alt="author" width="250px" class="rounded-circle">
                        </div>
                        <div class="col-md-8 order-md-1 col-lg-7 text-center text-md-start">
                            <h5 class="mb-2">Sagar Singh</h5>
                            <p class="lead mb-4">
                                Full stack Web Developer. I have always loved working with Php, although I have full knowledge of Python's Flask and Django Language but I love Php. This website is from the time when i was learning pHp
                            </p>
                        </div>
                    </div>
                </div>
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