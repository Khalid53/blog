<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: dashboard.php');
}


require_once '../vendor/autoload.php';
use App\classes\Login;
$message='';
if(isset($_POST['btn'])) {
    $message=Login::adminLoginCheck($_POST);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin || Panel</title>
        <link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card" style="margin-top: 200px">
                        <div class="card-title">
                            <h5 align="center"><i>Admin Panel</i></h5>
                        </div>
                        <div class="card-body">
                            <h5 style="color: red; text-align: center; "><?php echo $message; ?></h5>
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" name="btn" class="btn btn-primary btn-block">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>










    <script src="../asset/js/bootstrap.bundle.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    </body>
</html>