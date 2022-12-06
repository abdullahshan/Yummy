<?php
include("../database/env.php");
if(isset($_POST['submit'])){

    $id =  $_REQUEST['id'];

$title = $_POST['title'];
$price = $_POST['price'];
$descripion = $_POST['description'];

$image = $_FILES['image'];
    $imge_path = pathinfo($image['name']);

        $extention = $imge_path['extension'];

            $check_extention = ['jpg','png','svg'];

                $ex = in_array($extention,$check_extention);
               

               if($image['size'] == 0){

                $quer = "UPDATE event SET title='$title', price='$price', description='$descripion' WHERE id = '$id'";

               }else{

                $query = "SELECT image FROM event WHERE id = '$id'";
                    $exicute = mysqli_query($conn,$query);
                        $data = mysqli_fetch_assoc($exicute);

                        if(file_exists("../upload/event/".$data['image']));
                            unlink("../upload/event/".$data['image']);

                $image_Name = "_event". uniqid().'.'. $extention;

                move_uploaded_file($image['tmp_name'],"../upload/event/".$image_Name);

                $quer = "UPDATE event SET image='$image_Name', title='$title', price='$price', description='$descripion' WHERE id = '$id'";

               }

               $update =  $exicut = mysqli_query($conn,$quer);
                
               header("location: ../backend/all_event.php");

}

?>