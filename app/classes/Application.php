<?php


namespace App\classes;

use App\classes\Database;
class Application
{
    public function getAllPublishedBlogInfo(){
        $sql = "SELECT * FROM blogs WHERE status = '1' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult=mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
    public function getAllPublishedBlogInfoById($id){
        $sql = "SELECT * FROM blogs WHERE id= '$id' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult=mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error(Database::dbConnection() ));
        }
    }
}