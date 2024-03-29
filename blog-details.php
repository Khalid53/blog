<?php
require_once 'vendor/autoload.php';
use App\classes\Application;

$id=$_GET['id'];
$queryResult = Application::getAllPublishedBlogInfoById($id);
$blogInfo = mysqli_fetch_assoc($queryResult);




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Heroic Features</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/heroic-features.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h1 class="display-3">A Warm Welcome!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">

            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div style="height: 200px; width: 300px">
                        <img class="card-img-top" src="admin/<?php echo $blogInfo['blog_image']; ?>" alt="" height="200" width="300" />
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $blogInfo['blog_title']; ?></h3>
                        <h5 class="card-text"><?php echo $blogInfo['short_description']; ?></h5>
                        <p class="card-text"><?php echo $blogInfo['long_description']; ?></p>
                    </div>
                </div>
            </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="asset/jquery/jquery.min.js"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>

</body>

</html>
