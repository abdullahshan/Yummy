
 <?php 

 @include('./backend_inc/header.php');
 
 include("../database/env.php");
 
 $query = "SELECT * FROM orders";
 
 $exicute = mysqli_query($conn, $query);
 
  $data = mysqli_fetch_all($exicute,1);
 
//   print_r($data);
 
 ?>
 
 
         <div class="card">
             <div class="card-header">
                 <h1>Orders</h1>
             </div>
             <div class="card-header">
                 <div class="card-body">
                 <table class="w-100">
 
                 <thead class="thead-dark">
                     <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>address</th>
                     <th>phone</th>
                     <th>Amount</th>
                     <th>Status</th>
                     <th>Trunsection Id</th>
                     <th>currency</th>
                     <th>Action</th>
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
                                <td><?= $sdata['name'] ?></td>
                                <td><?= $sdata['email'] ?></td>
                                <td><?= $sdata['address'] ?></td>
                                <td><?= $sdata['phone'] ?></td>
                                <td><?= $sdata['amount'] ?></td>
                                <td><?= $sdata['status'] ?></td>
                                <td><?= $sdata['transaction_id'] ?></td>
                                <td><?= $sdata['currency'] ?></td>
                                <td><a class="btn btn-primary" href="./orderdetails.blade.php? id= <?= $sdata['id'] ?>">orders_details</a>
                                <a href="" class="btn btn-danger">delete</a>
                                </td>
                               
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