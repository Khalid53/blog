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

$category = new \App\classes\Category();
$queryResult=$category->getAllCategory();

$message="";
if (isset($_GET['delete'])) {
    $id= $_GET['id'];
    $message = $category->deleteCategory($id);
}
$uMessage='';
if (isset($_SESSION['message'])) {
    $uMessage=$_SESSION['message'];
    unset($_SESSION['message']);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Category</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
</head>
<body>
<?php include 'includes/menu.php'; ?>

<h1>Manage Category</h1>

<div class="container">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <h5 class="text-success text-center"><?php echo $uMessage; ?></h5>
                <h5 class="text-danger text-center"><?php echo $message; ?></h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; while ($manageCategory = mysqli_fetch_assoc($queryResult)) {?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $manageCategory['category_name']; ?></td>
                            <td><?php echo $manageCategory['category_description']; ?></td>
                            <td>
                                <?php
                                if ($manageCategory['publication_status'] == 1){
                                    echo 'Published';
                                } else {
                                    echo 'Unpublished';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="edit-category.php?id=<?php echo $manageCategory['id']; ?>" class="btn btn-success">Edit</a>
                                <a href="?delete=true&id=<?php echo $manageCategory['id']; ?>" onclick=" return confirm('Are you sure to delete this !!'); " class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
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