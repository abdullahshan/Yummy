<?php


include("../database/env.php");
if(isset($_POST['update_quantity'])){

    $id = $_GET['id'];

    
    $update_quantity = $_POST['update_quantity'];
    
    // print_r($update_quantity);

    $query  = "UPDATE card SET quantity='$update_quantity' where id = '$id'";
    $exi = mysqli_query($conn, $query);

        if($exi){

            header("location: http://localhost/Yummy/frontend_inc/cart_view.php");
        }else{
            echo "not";
        }
};


?>