<?php
$link = mysqli_connect('localhost', 'root', '','image_upload');

//echo '<pre>';
//print_r($_POST);
//print_r($_FILES);
//echo $_FILES['image_file']['name'];

if (isset($_POST['btn'])) {
    $fileName = $_FILES['image_file']['name'];
    $directory = 'images/';
    $imageUrl = $directory.$fileName; //images/aaa.jpeg
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $check = getimagesize($_FILES['image_file']['tmp_name']);
    if ($check) {
        if (file_exists($imageUrl)) {
            die('This image already exist. Please use another one. Thanks !!');
        } else {
            if ($_FILES['image_file']['size'] > 5000000) {
                die('Your image size is too large. Please select with in 10kb !!');
            } else {
                if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'JPG' && $fileType != 'jpeg') {
                    die('Image type is not supported. Please use jpg or png');
                } else {
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $imageUrl);
                    $sql = "INSERT INTO images (image_file) VALUES ('$imageUrl') ";
                    mysqli_query($link, $sql);
                    echo "The image has been uploaded successfully. Thanks !!";
                }
            }
        }
    } else {
        die('Please chose a image file thanks !!');
    }
}

//move_uploaded_file($_FILES['image_file']['tmp_name'], $imageUrl);

?>



<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Select File</td>
            <td><input type="file" name="image_file" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="SubmiT" /></td>
        </tr>
    </table>
</form>



</hr>

<?php
$sql = "SELECT * FROM images";
$queryResult=mysqli_query($link, $sql);

?>

<table>
    <?php while ($image = mysqli_fetch_assoc($queryResult)) {?>
    <tr>
        <td><img src="<?php echo $image['image_file']; ?>" alt="" height="100" width="150" /></td>
    </tr>
    <?php } ?>
</table>
