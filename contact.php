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
            <h2>iDiscuss - Contact Us</h2>

            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                
                    echo '<form class="row g-3 d-flex m-auto my-4 mb-5" style="max-width: 80%;" action="/forum/partials/_handlecontact.php" method="post">
                        <div class="col-md-6">
                            <label for="fname" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="fname" minlength="1" name="fname" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lname" minlength="1" name="lname" placeholder="Last Name">
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" minlength="1" name="email" placeholder="Email Adress">
                        </div>
                        <div class="col-6">
                            <label for="subject" class="form-label">subject:</label>
                            <input type="text" class="form-control" id="subject" minlength="1" name="subject" placeholder="Concern About">
                        </div>
                        <div class="fcol-12">
                            <label for="msg" class="form-label">Message:</label>
                            <textarea class="form-control" placeholder="Elaborate Your Concern" id="message" name="message" style="height: 100px"></textarea>
                        </div>
                        <div class="d-grid gap-2 my-5">
                            <button type="submit" class="btn btn-primary">Connect with iDiscuss</button>
                        </div>
                    </form>';
                }
                else{
                    echo '<div class="jumbotron jumbotron-fluid px-5 py-3 my-5" style="background: #e2ecea; max-width: 900px; margin: auto;">
                        <h1 class="display-6">Sorry you can not connect with iDiscuss</h1>
                        <p class="mb-3">Log in or sign up to connect with iDiscuss</p>
                        <a href="#" class="btn btn-danger my-2 px-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        <a href="#" class="btn btn-danger my2 px-4" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</a>
                    </div>';
                }
            ?>


        </div>









        <?php include 'partials/_footer.php'; ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    </body>

    </html>
</body>

</html>