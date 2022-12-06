<?php
session_start();
include("../database/env.php");

$id = $_REQUEST['id'];


$query = "DELETE FROM event WHERE id = '$id'";
    $exicute = mysqli_query($conn,$query);

    if($exicute){

        $_SESSION['success'] = "Data delete successfully done!";
        header(("location: ../backend/all_event.php"));
    }




?>