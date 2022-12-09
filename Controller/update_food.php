<?php

session_start();


include ("../database/env.php");

    if(isset($_POST['submit'])){

        $id = $_POST['id'];

        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $checkbox = $_POST['checkbox'];
        $old_image = $_POST['old_image'];

        $image =  $_FILES['image'];

      

        $error = [];
      
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

            header("location: ../backend/edite_food.php? id= $id");
        }else{


            if($image['size'] > 0){

                if(file_exists("../upload/food/".$old_image)){

                    unlink("../upload/food/".$old_image);
                }

                $image_name = $image['name'];
                $extension = pathinfo($image_name)['extension'];
        
                $new_imageName = "_food..." . uniqid(). '.' . $extension;
                $tmp_name  = $image['tmp_name'];
        
                
                if(!file_exists("../upload/food")){
                    mkdir("../upload/food");
                }
        
                    move_uploaded_file($tmp_name,"../upload/food/".$new_imageName);



                $query = "UPDATE foods SET `image`='$new_imageName',`title`='$title',`description`='$description',`price`='$price',`category_id`='$checkbox' WHERE id = '$id'";
                    $exicute = mysqli_query($conn,$query);


            }else{


                $query = "UPDATE foods SET `title`='$title',`description`='$description',`price`='$price',`category_id`='$checkbox' WHERE id = '$id'";
                $exicute = mysqli_query($conn,$query);


            }

            if($exicute){
                $_SESSION['success']  = "Food update successfully done!";
                header("location: ../backend/all_food.php");
            }
        }


        
    }

?>