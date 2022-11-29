<?php
session_start();

$id = $_REQUEST['id'];

include("../database/env.php");


$query  = "DELETE FROM banner WHERE id = $id";

    $exicute = mysqli_query($conn, $query);

    if($exicute){
       $_SESSION['success'] = "Banner delete succesfully done!";
        header("location: ../backend/all_banner.php");
     
    }else{
        echo "not";
    }


?>