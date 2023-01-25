
 <?php 

 @include('./backend_inc/header.php');
 
 include("../database/env.php");

 $id = $_GET['id'];

//  print_r($id);

//  exit;

 $query = "SELECT * FROM order_details where order_id = '$id'";
 
 $exicute = mysqli_query($conn, $query);
 
  $data = mysqli_fetch_all($exicute,1);
 
//   print_r($data);
 
 ?>
 
 
         <div class="card">
             <div class="card-header">
                 <h1>Orders details</h1>
             </div>
             <div class="card-header">
                 <div class="card-body">
                 <table class="table">
 
                 <thead class="thead-dark">
                     <tr>
                     <th>Id</th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th>Price</th>
                     <th>Delete</th>
                     </tr>
                 </thead>
                 <tbody>
                 <tr>
                    
                 </tr>
                 </tbody>
                 <?php

                        foreach ($data as $key => $sdata) {
                            ?>

                            <tr>
                                <td><?= ++$key ?></td>
                                <td><img style="height: 100px;" src="../upload/food/<?= $sdata['image'] ?>" alt=""></td>
                                <td><?= $sdata['name'] ?></td>
                                <td><?= $sdata['queantity'] ?></td>
                                <td><?= $sdata['price'] ?></td>
                                <td><a href=""  class="btn btn-danger">delete</a></td>


                               
                            </tr>

                            <?php
                        }

                 ?>
                 </table>
                 </div>
                 
           
             </div>
         </div>
 
 <?php
 
 @include('./backend_inc/footer.php');
 
 ?>