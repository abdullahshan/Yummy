
<style>

    ul li{

        list-style: none;
       
    }
    .dropdown{
        text-decoration: none;
    }
    ul li label{

padding-left: 20px;
} 

ul li label input{
    margin-right: 10px;
}
</style>


<?php

$id = $_GET['id'];


include("./backend_inc/header.php");

include("../database/env.php");

//---All---Food---//

$query = "SELECT * FROM foods WHERE id = '$id'";
    $exicute = mysqli_query($conn,$query);

        $data = mysqli_fetch_assoc($exicute);


//------All---category//////

$query = "SELECT * FROM category";
    $exicute = mysqli_query($conn,$query);

        $category = mysqli_fetch_all($exicute,1);


?>


   <div class="card">
        <div class="card-header">
            <h2>edit Food</h2>
        </div>
        <div class="card-body">
        <form action="../Controller/update_food.php" method="POST" enctype="multipart/form-data">

            <div class="row" style="width: 800px; margin:auto">

                       <label class="mt-3" for="image">Insert image <br/>

                       <img style="width: 150px;" src="../upload//food/<?= $data['image'] ?>" alt="">
                        <input class="d-none" type="file" value="<?= $data['image'] ?>" id="image" name="image" class="form-control" placeholder="enter your image">
                                                
                    </label>

                    <input type="text" class="d-none" name="id" value="<?= $data['id'] ?>">
                    <input type="text" class="d-none" name="old_image" value="<?= $data['image'] ?>">

                       <label class="mt-3" for="">Insert Title
                        <input type="text" value="<?= $data['title'] ?>" name="title" class="form-control" placeholder="enter your image">
                                                
                                        <?php

                            if(isset($_SESSION['error']['title_error'])){
                                ?>

                                    <span class="text-danger"><?= $_SESSION['error']['title_error'] ?></span>
                                
                                <?php
                            }

                            ?>
                    </label>

                       <label class="mt-3" for="">Insert description
                        <input type="text" value="<?= $data['description'] ?>" name="description" class="form-control" placeholder="enter your image">
                                                
                                        <?php

                            if(isset($_SESSION['error']['error_description'])){
                                ?>

                                    <span class="text-danger"><?= $_SESSION['error']['error_description'] ?></span>
                                
                                <?php
                            }

                            ?>
                    </label>

                       <label class="mt-3" for="">Insert price
                        <input type="text" value="<?= $data['price'] ?>" name="price" class="form-control" placeholder="enter your image">
                                                
                                        <?php

                            if(isset($_SESSION['error']['error_price'])){
                                ?>

                                    <span class="text-danger"><?= $_SESSION['error']['error_price'] ?></span>
                                
                                <?php
                            }

                            ?>
                    </label>

                    <label class="mt-3" for="">Choose Category <br/>
                                    
                    <ul>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        please select Category<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        
                               <?php
                                    foreach($category as $category_data){
                                      
                                      ?>

                                        <li><label class="checkbox"><input name="checkbox" value="<?= $category_data['id'] ?>" type="checkbox"><?= $category_data['title'] ?></label></li>

                                      <?php
                                    }
                               ?>

                        </ul>
                    </li>
                    </ul>
                
                
                            <?php

                            if(isset($_SESSION['error']['error_checkbox'])){
                                ?>

                                    <span class="text-danger"><?= $_SESSION['error']['error_checkbox'] ?></span>
                                
                                <?php
                            }

                            ?>
                    </label>

                      <label for="">
                      <button type="submit" class="btn btn-primary w-100 mt-3" name="submit">updata food</button>
                      </label>
            </div>
            

        </form>
            </div>
   </div>


<?php

include("./backend_inc/footer.php");

unset($_SESSION['error'])

?>



?>