<?php

session_start();


include ("../database/env.php");

    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $checkbox = $_POST['checkbox'];

        $image =  $_FILES['image'];

        $image_name = $image['name'];
        $image_path = pathinfo($image_name);

        $extension = $image_path['extension'];

        $new_imageName = "_food..." . uniqid(). '.' . $extension;
        $tmp_name  = $image['tmp_name'];

        
        if(!file_exists("../upload/food")){
            mkdir("../upload/food");
        }

            move_uploaded_file($tmp_name,"../upload/food/".$new_imageName);





        $error = [];

        if($image['size'] == 0){

            $error['image_error']  = "please choose your image";
        }
            
        if(empty($title)){

            $error['title_error'] = "please enter your title";
        }

        if(empty($description)){

            $error['error_description']  = "please enter your description";
        }

        if(empty($price)){

            $error['error_price']  = "please enter your price";
        }

        if(empty($checkbox)){

            $error['error_checkbox'] = "please choose your category";
        }


        if(count($error) > 0){

            $_SESSION['error']  = $error;

            header("location: ../backend/add_food.php");
        }else{

            $query = "INSERT INTO foods(image, title, description, price, category_id) VALUES ('$new_imageName','$title','$description','$price','$checkbox')";

                $exicute = mysqli_query($conn,$query);

                if($exicute){
                    
                    $_SESSION['success'] = "Food insert successfully done!";
                    header("location: ../backend/all_food.php");
                }
        }

        
    }

?>