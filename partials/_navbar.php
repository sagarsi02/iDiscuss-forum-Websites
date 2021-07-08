<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
}
else{
  $loggedin = false;
}
 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forum/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Top Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

              $sql = "SELECT categories_name, categories_id FROM `categories` LIMIT 5";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)){
                echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['categories_id'].'">'. $row['categories_name'] .'</a></li>';
              }

            echo '</ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forum/contact.php">Contact</a>
        </li>
        </ul>
            <form class="d-flex" action="search.php" method="get">
              <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success mx-2" type="submit">Search</button>
            </form>';



      if(!$loggedin){
        echo '<button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>';
      }
      if($loggedin){
        echo '<p class="text-light my-0 m-3">Welcome: '.$_SESSION['user_email'].'</p>';
            echo '<a role="button" class="btn btn-outline-success my-0" href="/forum/partials/_logout.php">LogOut</a>';
      }
    echo '</div>
  </div>
</nav>';

include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';

//SignUp alert
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
          <strong>Success!</strong> Your account created successfully now you can loggin.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if (isset($_GET['signupsuccess']) && ($_GET['signupsuccess']=="false")) {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
          <strong>Warning!</strong> Email Already in use. Please try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if (isset($_GET['password']) && ($_GET['password']=="false")) {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
          <strong>Warning!</strong> Passwors do not matches. Please try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

//login alert
if (isset($_GET['login']) && ($_GET['login']=="true")) {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
          <strong>Congractulation!</strong> you are logedin.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if (isset($_GET['login']) && ($_GET['login']=="false")) {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
          <strong>Warning!</strong> Your password is wrong Please try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if (isset($_GET['email']) && ($_GET['email']=="false")) {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
          <strong>Warning!</strong> Your email does not exist Please try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

// Contact Alert

if (isset($_GET['ConnectionSuccess']) && $_GET['ConnectionSuccess']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
          <strong>Success!</strong> Your message send Successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

?>