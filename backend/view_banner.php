
 <?php 

@include('./backend_inc/header.php');

include("../database/env.php");

$id = $_REQUEST['id'];


$query = "SELECT id, banner_image, title, link, description FROM banner WHERE id = $id";

$exicute = mysqli_query($conn, $query);

 $data = mysqli_fetch_assoc($exicute);

 

?>


        <div class="card">
            <div class="card-header">
                <h1>Banner Details</h1>
            </div>
            <div class="card-header">
                <div class="card-body">
                <table class="table">

                <thead class="thead-dark">
                    <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['title'] ?></td>
                    <td><?= $data['link'] ?></td>
                    <td><img src="../upload/banner/<?= $data['banner_image'] ?>" width="100px" height="100px" alt=""></td>
                    <td><?= substr($data['description'], 0, 20) . '......' ?></td>
                </tr>
                </tbody>

                </table>
                </div>
                
                <div class="card-footer">
                <?=  isset($_SESSION['auth']) ? $_SESSION['auth']['f_name']. ' ' . $_SESSION['auth']['l_name'] :'akasher tara' ?>
                </div>
          
            </div>
        </div>

<?php

@include('./backend_inc/footer.php');

?>