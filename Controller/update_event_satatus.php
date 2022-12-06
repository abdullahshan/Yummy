<?php
session_start();
include("../database/env.php");
include("../database/env.php");
$id = $_REQUEST['id'];


$query = "SELECT status FROM event WHERE id = '$id'";
    $exicute = mysqli_query($conn,$query);

        $data = mysqli_fetch_assoc($exicute);

if($data['status'] == 0){

    $query = "UPDATE event SET status='1' WHERE id = '$id'";
}elseif($data['status'] == 1){

    $query = "UPDATE event SET status='0' WHERE id = '$id'";
}

    $exicute = mysqli_query($conn,$query);

        if($exicute){
            $_SESSION['success'] = "Status update seccessfully done!";
            header("location: ../backend/all_event.php");
        }


?>