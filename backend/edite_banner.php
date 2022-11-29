

<?php
    include('./backend_inc/header.php');

    include("../database/env.php");

    $id = $_REQUEST['id'];


        $query = "SELECT * FROM banner WHERE id = $id";
    $runquery = mysqli_query($conn, $query);

   $data = mysqli_fetch_assoc($runquery);


?>


                <!-- Page Heading -->
              <h1>edit banner</h1>

              <div class="card">
                <div class="card-header">
                    <h3>Add new banner</h3>
                </div>
                <div class="card-body">





        <form action="../Controller/update_banner.php? id=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                                
                <div class="row align-items-center">


                
                <div class="col-lg-3">
                     <label for="bannerimage">Inser image <br/>
                     <?php

                    if(isset($_SESSION['errors']['file_error'])){

                        ?>
                        <span class="text-danger"><?=  $_SESSION['errors']['file_error'] ?></span>
                    <?php
                    }
                    ?>
                <img name="image" src="../upload/banner/<?= $data['banner_image'] ?>" width="100%" height="100px" alt="">

                </label>
                <input type="file" name="file" class="d-none" id="bannerimage">
                </div>





                <div class="col-lg-9">

                    <label class="w-100">Insert Title
                    <input value="<?= $data['title'] ?>" type="text" name="title" class="form-control">
                    <?php

                        if(isset($_SESSION['errors']['title_error'])){

                            ?>
                            <span class="text-danger"><?=  $_SESSION['errors']['title_error'] ?></span>
                       <?php
                        }
                    ?>
                    </label>




                    <label class="w-100">Insert a video Link
                    <input value="<?= $data['link'] ?>" type="text" name="link" class="form-control">
                    <?php

                    if(isset($_SESSION['errors']['link_error'])){

                        ?>
                        <span class="text-danger"><?=  $_SESSION['errors']['link_error'] ?></span>
                    <?php
                    }
                    ?>
                    </label>




                    <label class="w-100">Description
                    <textarea type="text" name="description" class="form-control">
                            <?= $data['description'] ?>
                    </textarea>
                    <?php

                        if(isset($_SESSION['errors']['description_error'])){

                            ?>
                            <span class="text-danger"><?=  $_SESSION['errors']['description_error'] ?></span>
                        <?php
                        }
                        ?>
                    </label>


                </div> 
                    </div>
                    <br/>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                  </form>





                    </div>
                        </div>
             
<?php



include('./backend_inc/footer.php')

?>
