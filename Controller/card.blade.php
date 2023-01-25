<?php 
    session_start();
    include("../database/env.php");

       if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $image = $_POST['image'];
        $title = $_POST['title'];
        $price = $_POST['price'];


        $user_id = $_SESSION['auth']['id'];
//         print_r($user_id);
// exit;
      
     if(!$_SESSION['auth']){
        $_SESSION['success'] = "please login for orders";
        header("location: http://localhost/Yummy/backend/login.php");

     }else {

            $query = "INSERT INTO card(food_id, user_id, image, title, price) VALUES ('$id','$user_id','$image','$title','$price')";
                $exicute = mysqli_query($conn,$query);

                if($exicute){

            header("location: http://localhost/Yummy/#menu");
           
        }
         }
     }
       
       



?>