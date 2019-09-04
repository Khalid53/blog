<?php


namespace App\classes;
use App\classes\Database;

class Blog extends Category
{
    public function getAllPublishedCategoryInfo(){
        $sql = "SELECT * FROM categories WHERE publication_status = 1";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
    public function addABlogInfo($data){
        $fileName = $_FILES['blog_image']['name'];
        $directory = '../asset/images/';
        $imageUrl = $directory.$fileName; //images/aaa.jpeg
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['blog_image']['tmp_name']);
        if ($check) {
            if (file_exists($imageUrl)) {
                die('This image already exist. Please use another one. Thanks !!');
            } else {
                if ($_FILES['blog_image']['size'] > 5000000) {
                    die('Your image size is too large. Please select with in 10kb !!');
                } else {
                    if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'JPG' && $fileType != 'jpeg') {
                        die('Image type is not supported. Please use jpg or png');
                    } else {
                        move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
                        $sql = "INSERT INTO blogs (category_id,blog_title,short_description,long_description,blog_image,status) 
                             values ('$data[category_id]','$data[blog_title]','$data[short_description]','$data[long_description]','$imageUrl','$data[status]' )";
                        if (mysqli_query(Database::dbConnection(), $sql)) {
                            $message = "Blog info save successfully";
                            return $message;
                        } else {
                            die('Query Problem'.mysqli_error(Database::dbConnection() ));
                        }
                    }
                }
            }
        } else {
            die('Please chose a image file thanks !!');
        }
    }
    public function getAllBlogInfo() {
        $sql = "SELECT b.*, c.category_name FROM blogs as b, categories as c WHERE b.category_id=c.id "; //inner joint
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
    public function viewAllBlogInfo($id){
        $sql = "SELECT * FROM blogs WHERE id='$id' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
    public function editAllBlogById($id){
        $sql = "SELECT * FROM blogs WHERE id='$id'";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult2 = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult2;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
    public function updateBlogInfo($data) {
        $blogImage = $_FILES['blog_image']['name'];
        if ($blogImage) {
            $sql = "SELECT * FROM blogs WHERE id='$data[id]' ";
            $queryResult=mysqli_query(Database::dbConnection(), $sql);
            $blogInfo=mysqli_fetch_assoc($queryResult);
            unlink($blogInfo['blog_image']);

            $fileName = $_FILES['blog_image']['name'];
            $directory = '../asset/images/';
            $imageUrl = $directory.$fileName; //images/aaa.jpeg
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $check = getimagesize($_FILES['blog_image']['tmp_name']);
            if ($check) {
                if (file_exists($imageUrl)) {
                    die('This image already exist. Please use another one. Thanks !!');
                } else {
                    if ($_FILES['blog_image']['size'] > 5000000) {
                        die('Your image size is too large. Please select with in 10kb !!');
                    } else {
                        if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'JPG' && $fileType != 'jpeg') {
                            die('Image type is not supported. Please use jpg or png');
                        } else {
                            move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
                            $sql = "UPDATE blogs SET category_id='$data[category_id]',blog_title='$data[blog_title]',short_description='$data[short_description]',long_description='$data[long_description]',blog_image='$imageUrl', status='$data[status]' WHERE id='$data[id]' ";
                            if (mysqli_query(Database::dbConnection(), $sql)) {
                                header('Location: manage-blog.php');
                            } else {
                                die('Query Problem'.mysqli_error(Database::dbConnection() ));
                            }
                        }
                    }
                }
            } else {
                die('Please chose a image file thanks !!');
            }


        } else {
           $sql = "UPDATE blogs SET category_id='$data[category_id]',blog_title='$data[blog_title]',short_description='$data[short_description]',long_description='$data[long_description]',status='$data[status]' WHERE id='$data[id]' ";
           if (mysqli_query(Database::dbConnection(), $sql)) {
               session_start();
               $_SESSION['message'] = 'Blog info updated successfully';
               header('Location: manage-blog.php');
           } else {
               die('Query Problem'.mysqli_error(Database::dbConnection() ));
           }
        }

      }
         public function deleteBlogInfoById($id){
            $sql = "DELETE FROM blogs WHERE id='$id' ";
             if (mysqli_query(Database::dbConnection(), $sql)) {
                  $message = "Delete blog info successfully";
                  return $message;
             } else {
                 die('Query Problem'.mysqli_error(Database::dbConnection() ));
             }
            }











}
















