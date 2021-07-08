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


        <!-- Slider Start Here -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/social.jpeg" style="height: 400px; width: 100%" ; alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/scroll1.png" style="height: 400px; width: 100%" ; alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/scroll3.png" style="height: 400px; width: 100%" ; alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Category container Start Here -->

        <div class="container">
            <h2 class="text-center my-3">iDiscuss - Browse Categories</h2>

            <div class="row">
                <!-- Fetch all the categories use a for loop to itrate through categories -->

                <?php
                    $sql = "SELECT * FROM `categories`";
                    $ressult = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($ressult)) {
                        // echo $row['categories_id'];
                        // echo $row['categories_name'];
                        $id = $row['categories_id'];
                        $cat = $row['categories_name'];
                        $desc = $row['categories_discription'];
                        $img = $row['categories_img'];
                        echo '<div class="col-md-4 my-3" style="display: flex; justify-content: center; align-items: center;">
                            <div class="card" style="width: 18rem;">
                                <img src=  "img/' . $img . '"  style="height: 200px;" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '" class="text-decoration-none text-dark">' . $cat . '</a></h5>
                                    <p class="card-text">' . substr($desc, 0, 90) . '...</p>
                                    <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
                                </div>
                            </div>
                        </div>';
                    }
                ?>











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