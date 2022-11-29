<?php 

session_start();


include("../database/env.php");

if(isset($_POST['submit'])){

    $_title = $_POST['title'];
    $_link = $_POST['link'];
    $_description = $_POST['description'];
   
            $image = $_FILES['file'];

            $_file = $image['name'];
            $_tmp_Name = $image['tmp_name'];

        $fileNameParts = explode('.', $_file);
        $extention = end($fileNameParts);
        $excepted_extention = ['jpg','png','webp','svg'];
        $ex_accept = in_array($extention,$excepted_extention);

        $file_Name = "banner_" . uniqid() . '.' . $extention;

        move_uploaded_file ($_tmp_Name ,"../upload/banner/$file_Name");


}

$_errors = [];


if($image['size'] == 0){

    $_errors['file_error'] = "Enter your image";

}elseif($ex_accept == false){

        $_errors['file_error'] = "Please insert proper image format";
}

if(empty($_title)){

    $_errors['title_error'] = "Enter your title";

}
if(empty($_link)){

    $_errors['link_error'] = "Enter your link";

}

if(empty($_description)){

    $_errors['description_error'] = "Enter your description";

}

if(empty($_title)){

    $_errors['description_error'] = "Enter your description";

}



if(count($_errors) > 0){

    $_SESSION['errors'] = $_errors;
    header("location: ../backend/banner.php");
}else{

    $query = "INSERT INTO banner(banner_image, title, link, description) VALUES ('$file_Name','$_title','$_link','$_description')";

    $stor_banner = mysqli_query($conn, $query);

    if($stor_banner){

        $_SESSION['success'] = "Banner insert successfully done!";
        header("location: ../backend/all_banner.php");
    }


}


?>