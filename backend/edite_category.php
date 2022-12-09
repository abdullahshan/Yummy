

 <?php 

include('./backend_inc/header.php');
include("../database/env.php");

$id = $_GET['id'];

$query = "SELECT * FROM category WHERE id = '$id'";
    $exicute = mysqli_query($conn,$query);

        $data = mysqli_fetch_assoc($exicute);

        print_r($data);

?>

<div class="card">
    <div class="card-header">
        <h3>Add Category</h3>
    </div>
        <div class="card-body">

            <form action="../Controller/update_category.php? id= <?= $data['id'] ?>" method="POST">
              <div class="row" style="width: 500px; margin:auto;">
              <label class="w-100" for="">Category Title <br/>
              </label>
               <input type="text" name="category" class="form-control" placeholder="Enter your category">

               <button type="submit" name="submit" class="btn btn-primary w-100 mt-3">Submit</button>

              </div>
            </form>
    
        </div>
</div>

<?php

@include('./backend_inc/footer.php');

?>