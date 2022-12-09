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

include("./backend_inc/header.php");

include("../database/env.php");

$query = "SELECT * FROM category WHERE status = '1'";
    $exicute = mysqli_query($conn,$query);

        $data = mysqli_fetch_all($exicute,1);

?>


   <div class="card">
        <div class="card-header">
            <h2>Add Food</h2>
        </div>
        <div class="card-body">
        <form action="../Controller/store_food.php" method="POST" enctype="multipart/form-data">

            <div class="row" style="width: 800px; margin:auto">

                       <label class="mt-3" for="i">Insert image <br/>
                       
                       <input type="file" id="i" name="image" class="form-control input_btn d-none" placeholder="enter your image">
                                       
                       <img class="input_image" style="width: 100px;" src="data:image/png;base64,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" alt="">
                                        <?php

                            if(isset($_SESSION['error']['image_error'])){
                                ?>

                                    <span class="text-danger"><?= $_SESSION['error']['image_error'] ?></span>
                                
                                <?php
                            }

                            ?>
                    </label>


                       <label class="mt-3" for="">Insert Title
                        <input type="text" name="title" class="form-control" placeholder="enter your image">
                                                
                                        <?php

                            if(isset($_SESSION['error']['title_error'])){
                                ?>

                                    <span class="text-danger"><?= $_SESSION['error']['title_error'] ?></span>
                                
                                <?php
                            }

                            ?>
                    </label>


                       <label class="mt-3" for="">Insert description
                        <input type="text" name="description" class="form-control" placeholder="enter your image">
                                                
                                        <?php

                            if(isset($_SESSION['error']['error_description'])){
                                ?>

                                    <span class="text-danger"><?= $_SESSION['error']['error_description'] ?></span>
                                
                                <?php
                            }

                            ?>
                    </label>


                       <label class="mt-3" for="">Insert price
                        <input type="text" name="price" class="form-control" placeholder="enter your image">
                                                
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

                                foreach($data as $sdata){
                                    ?>

                                <li><label class="checkbox"><input name="checkbox" value="<?= $sdata['id'] ?>" type="checkbox"><?= $sdata['title'] ?></label></li>

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
                      <button type="submit" class="btn btn-primary w-100 mt-3" name="submit">Submit</button>
                      </label>
            </div>
            

        </form>
            </div>
   </div>


<?php

include("./backend_inc/footer.php");

unset($_SESSION['error'])

?>




<script>

    let $input_btn = document.querySelector('.input_btn');

    let $input_image = document.querySelector('.input_image');

        $input_btn.addEventListener('change', function(e) {

                 let url =  window.URL.createObjectURL(e.target.files[0]);

                     $input_image.src = url
            })

</script>