<?php
session_start();
if($_SESSION['id'] == NULL) {
    header('Location: index.php');
}

require_once '../vendor/autoload.php';
$login = new \App\classes\Login();
$objBlog = new \App\classes\Blog();

if(isset($_GET['logout'])) {
    $login->adminLogout();
}
$id=$_GET['id'];
$queryResult=$objBlog->viewAllBlogInfo($id);
$blogInfo=mysqli_fetch_assoc($queryResult);




?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Blog</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
</head>
<body>
<?php include 'includes/menu.php'; ?>

<h1>Manage Blog</h1>

<div class="container">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Blog Id</th>
                            <td><?php echo $blogInfo['id']; ?></td>
                        </tr>
                        <tr>
                            <th>Blog Title</th>
                            <td><?php echo $blogInfo['blog_title']; ?></td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td><?php echo $blogInfo['category_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Blog Short Description</th>
                            <td><?php echo $blogInfo['short_description']; ?></td>
                        </tr>
                        <tr>
                            <th>Blog Long Description</th>
                            <td><?php echo $blogInfo['long_description']; ?></td>
                        </tr>
                        <tr>
                            <th>Blog Image</th>
                            <td><img src="<?php echo $blogInfo['blog_image']; ?>" alt="" height="100" width="100" /></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td><?php echo $blogInfo['status'] == 1 ? 'Published' : 'Unpublished' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>










<script src="../asset/jquery/jquery.min.js"></script>
<script src="../asset/js/bootstrap.bundle.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>
</body>
</html>