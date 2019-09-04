<?php
session_start();
if($_SESSION['id'] == NULL) {
    header('Location: index.php');
}



require_once '../vendor/autoload.php';
$login = new \App\classes\Login();

if(isset($_GET['logout'])) {
    $login->adminLogout();
}




?>







<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
    </head>
    <body>
    <?php include 'includes/menu.php';?>
    <h1>Dashboard</h1>









    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/js/bootstrap.bundle.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    </body>
</html>