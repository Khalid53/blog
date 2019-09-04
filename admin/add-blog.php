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
$objBlog = new \App\classes\Blog();
$queryResult = $objBlog->getAllPublishedCategoryInfo();



$message='';

if (isset($_POST['btn'])) {
    $message = $objBlog->addABlogInfo($_POST);
}




?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Blog</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
</head>
<body>
<?php include 'includes/menu.php'; ?>
<h1>Add Category</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card" style="margin-top: 10px">
                <div class="card-body">
                    <h5 class="text-center text-success"><?php echo $message; ?></h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control">
                                    <option>-------------Select Category Name----------</option>
                                    <?php while ($manageCategory = mysqli_fetch_assoc($queryResult)) { ?>
                                    <option value="<?php echo $manageCategory['id']; ?>"><?php echo $manageCategory['category_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Short Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="short_description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Long Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="long_description" class="form-control textarea"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="blog_image" accept="image/*" multiple class="form-control"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" name="status" value="1" />Published
                                <input type="radio" name="status" value="0" />Unpublished
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-primary btn-block">Save Blog</button>
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
<!----------------------------Tinymce Plugin Start------------------------------>
<script src="../asset/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'.textarea'});</script>
<!---------------------------Tinymce Plugin End--------------------------------->
<script src="../asset/js/bootstrap.min.js"></script>
</body>
</html>