<?php


namespace App\classes;
use App\classes\Database;

class Category
{
    public function saveAllCategory($data) {
//        echo'<pre>';
//        print_r($data);
        $sql = "INSERT INTO categories (category_name,category_description,publication_status) values ('$data[category_name]','$data[category_description]','$data[publication_status]')";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $message = "Category save successfully";
            return $message;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }

    }
    public function getAllCategory() {
        $sql = " SELECT * FROM categories ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
    public function editCategory($id){
        $sql = "SELECT * FROM categories WHERE id = '$id' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
    public function updateCategoryById($data) {
        $sql = "UPDATE categories SET category_name='$data[category_name]',category_description='$data[category_description]',publication_status='$data[publication_status]' WHERE id='$data[id]' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            session_start();
            $_SESSION['message']='Update category info successfully';
            header('Location: manage-category.php');
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id='$id' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $message = "Category info Deleted successfully";
            return $message;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
}


























