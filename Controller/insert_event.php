<?php 

session_start();



    include("../database/env.php");

    if(isset($_POST['submit'])){

        $_title = $_POST['title'];
        $_price = $_POST['price'];
        $_description = $_POST['description'];

        $_image  = $_FILES['image'];

      $_path =   pathinfo($_image['name']);
       

      $extention =  $_path['extension'];

      $except_extention = ['jpg','png','webp'];

     $ex_accept =    in_array($extention,$except_extention);


 }

     $errors = [];

     if(empty($_title)){

        $errors['error_title'] = "please enter your title";
     }

     if(empty($_price)){

        $errors['error_price'] = "Please enter price";
     }

     if(empty($_description)){

        $errors['error_description'] = "Please enter your description";
     }

     if($_image['size']==0){
        $errors['error_image'] = "please enter your image";
    }elseif($ex_accept == false){
        $errors['error_image'] = "Please enter your perfect image";
    }
        

    if(count($errors) > 0){

        $_SESSION['errors'] = $errors;
       header("location: ../backend/insert_event.php");
    }else{


        $new_image_Name = "_envent". uniqid(). '.' . $extention;

        move_uploaded_file($_image['tmp_name'], "../upload/event/$new_image_Name");

        $query = "INSERT INTO event(image, title, price, description) VALUES ('$new_image_Name','$_title','$_price','$_description')";

            $exicute = mysqli_query($conn,$query);

                if($exicute){
                    
                    $_SESSION['success'] = "Event succesfully done!";
                  header("location: ../backend/all_event.php");
                    
                }
 
    }


?>