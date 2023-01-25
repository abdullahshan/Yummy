<?Php

session_start();
include("../database/env.php");
if(isset($_POST['submit'])){

   


  $total_price = $_POST['price'];

  $user =  $_SESSION['auth'];
  
  $user_id = $user['id'];
  $user_name = $user['l_name'];
  $user_email = $user['email'];
  $user_phone = '01887215934';
  

    // print_r($user_id);
   
    //  exit;

   
}
/* PHP */
$post_data = array();
$post_data['store_id'] = "creat63b2e40c18b17";
$post_data['store_passwd'] = "creat63b2e40c18b17@ssl";
$post_data['total_amount'] = $total_price;
$post_data['currency'] = "BDT";
$tran_id = $post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://localhost/Yummy/controller/success.php";
$post_data['fail_url'] = "http://localhost/Yummy/frontend_inc/fail.php";
$post_data['cancel_url'] = "http://localhost/Yummy/frontend_inc/cancel.php";
# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = $user_name;
$post_data['cus_email'] = $user_email;
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = $user_phone;
$post_data['cus_fax'] = "01711111111";

# SHIPMENT INFORMATION
$post_data['ship_name'] = "testcreatieiq";
$post_data['ship_add1 '] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = "ref001";
$post_data['value_b '] = "ref002";
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

# CART PARAMETERS
$post_data['cart'] = json_encode(array(
    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
));
$post_data['product_amount'] = "100";
$post_data['vat'] = "5";
$post_data['discount_amount'] = "5";
$post_data['convenience_fee'] = "3";




# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
	curl_close( $handle);
	$sslcommerzResponse = $content;

                
    $query = "INSERT INTO orders(name, email, phone, amount, status, transaction_id, currency) VALUES ('$user_name','$user_email','$user_phone','$total_price','pending','$tran_id','BDT')";

    $run = mysqli_query($conn,$query);

    $last_id = $conn->insert_id;




    $query = "SELECT * FROM card where user_id = '$user_id'";
            $exitcute = mysqli_query($conn,$query);
                $data = mysqli_fetch_all($exitcute,1);


                    foreach($data as $s_data){
                        $id = $s_data['id'];
                        $image = $s_data['image'];
                        $name = $s_data['title'];
                        $price = $s_data['price'];
                        $quantity = $s_data['quantity'];

                                        
                    $query ="INSERT INTO order_details(order_id, image, name, price, queantity) VALUES ('$last_id','$image','$name','$price','$quantity')";
                                    
                    $rundetais = mysqli_query($conn,$query);


                  if($rundetais){

                    $query = "DELETE FROM card WHERE id = '$id'";
                    $run = mysqli_query($conn,$query);
                  }
       
                    }



} else {
	curl_close( $handle);
	echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
	exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
	echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
	# header("Location: ". $sslcz['GatewayPageURL']);
	exit;
} else {
	echo "JSON Data parsing error!";
}