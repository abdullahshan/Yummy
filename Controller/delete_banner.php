<?php
session_start();

$id = $_REQUEST['id'];

include("../database/env.php");


    $query = "SELECT banner_image FROM banner WHERE id='$id'";
                                
    $exicute = mysqli_query($conn,$query);

        $data = mysqli_fetch_assoc($exicute);

        $path = "../upload/banner/".$data['banner_image'];

            if(file_exists($path)){
                unlink($path);
            }


                $query  = "DELETE FROM banner WHERE id = $id";

                    $exicute = mysqli_query($conn, $query);

                    if($exicute){
                    $_SESSION['success'] = "Banner delete succesfully done!";
                        header("location: ../backend/all_banner.php");
                    
                    }


?>

