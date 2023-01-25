<?php
 
        
        session_start();
        include("../database/env.php");

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];


        
        if(isset($_SESSION['auth'])){
        
           $user_id = $_SESSION['auth']['id'];
         
        //    print_r($user_id);
        }
        

        $query = "SELECT * FROM card";
            $exitcute = mysqli_query($conn,$query);
                $data = mysqli_fetch_all($exitcute,1);

                $total_price = 0;
                foreach($data as $s_data){

                //   $product_name[] =   $s_data['title'].'('.$s_data['quantity'].')';
                  $price = $s_data['price'] * $s_data['quantity'];

                  $total_price = $total_price + $price;


                  ?>
                        <br>
                  <?Php
                }


                // $totla_prodcut = implode(', ',$product_name);

                // print_r($totla_prodcut);

                // exit;

    // $product = implode(',',$product_name);
    $total_price = $total_price;

    // print_r($total_price);
    // exit;

    $query = "INSERT INTO orders(name, email, phone, amount, address, status) VALUES ('$name','$email','$phone','$total_price','$address','panding')";

            $run = mysqli_query($conn,$query);
               
            $last_id = $conn->insert_id;
           

                 
                    foreach($data as $s_data){

                        $image = $s_data['image'];
                        $name = $s_data['title'];
                        $price = $s_data['price'] * $s_data['quantity'];
                        $quantity = $s_data['quantity'];


                      ?>
                            <br>
                      <?Php
                        // print_r($product_name);
                    $query ="INSERT INTO order_details(order_id, image, name, price, queantity) VALUES ('$last_id','$image','$name','$price','$quantity')";
                    
                        $rundetais = mysqli_query($conn,$query);
                    }

                        if($rundetais){

                            $query = "DELETE FROM card WHERE user_id =  '$user_id'";
                            $run = mysqli_query($conn,$query);

                            header("location: http://localhost/Yummy/frontend_inc/cart_view.php");   
                        }
            
                    
                    }

    



?>