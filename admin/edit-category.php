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

$message=" ";
$category = new \App\classes\Category();
 $id = $_GET['id'];
$queryResult = $category->editCategory($id);
$manageCategory=mysqli_fetch_assoc($queryResult);


if (isset($_POST['btn'])) {
    $message=$category->updateCategoryById($_POST);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
</head>
<body>
<?php include 'includes/menu.php'; ?>
<h1>Add Category</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card" style="margin-top: 10px">
                <div class="card-body">
                    <h5 class="text-success text-center"><?php echo $message; ?></h5>
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="category_name" class="form-control" value="<?php echo $manageCategory['category_name']; ?>" placeholder="category name">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $manageCategory['id']; ?>" placeholder="category name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="category_description" class="form-control" id="inputPassword3" placeholder="category description"><?php echo $manageCategory['category_description']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" name="publication_status" value="1" />Published
                                <input type="radio" name="publication_status" value="0" />Unpublished
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-primary btn-block">Update Category</button>
                            </div>
                        </div>
                    </form>
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