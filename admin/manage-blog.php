<?php
session_start();
if($_SESSION['id'] == NULL) {
    header('Location: index.php');
}
$uMessage="";
if (isset($_SESSION['message'])) {
    $uMessage =$_SESSION['message'];
   unset($_SESSION['message']);
}
require_once '../vendor/autoload.php';
$login = new \App\classes\Login();
$objBlog = new \App\classes\Blog();

if(isset($_GET['logout'])) {
    $login->adminLogout();
}
$queryResult=$objBlog->getAllBlogInfo();
$message='';
if ($_GET['delete']) {
    $id=$_GET['id'];
    $message = $objBlog->deleteBlogInfoById($id);
}



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
                    <h5 class="text-success text-center"><?php echo $uMessage; ?></h5>
                    <h5 class="text-success text-center"><?php echo $message; ?></h5>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Category Name</th>
                                    <th>Blog Title</th>
                                    <th>Blog Short Description</th>
                                    <th>Blog Long Description</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; while ($blogInfo = mysqli_fetch_assoc($queryResult)) {?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $blogInfo['category_name']; ?></td>
                                    <td><?php echo $blogInfo['blog_title']; ?></td>
                                    <td><?php echo $blogInfo['short_description']; ?></td>
                                    <td><?php echo $blogInfo['long_description']; ?></td>
                                    <td><?php echo $blogInfo['status'] == 1 ? 'Published' : 'Unpublished' ?></td>
                                    <td>
                                        <a href="view-blog.php?id=<?php echo $blogInfo['id']; ?>" class="btn btn-success">View</a>
                                        <a href="edit-blog.php?id=<?php echo $blogInfo['id']; ?>" class="btn btn-success">Edit</a>
                                        <a href="?delete=true&id=<?php echo $blogInfo['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
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