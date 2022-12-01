
<?php


include("../database/env.php");

$id = $_GET['id'];


    $query = "SELECT status FROM banner WHERE id='$id'";
        $exicute = mysqli_query($conn,$query);

            $data = mysqli_fetch_assoc($exicute);


    if($data['status']==0){

        $query =  "UPDATE banner SET status='1' WHERE id='$id'";

    }elseif($data['status']==1){
        
        $query =  "UPDATE banner SET status='0' WHERE id='$id'";

    }

    $exicute = mysqli_query($conn,$query);
    header("location: ../backend/all_banner.php");
?>