

<?php
include('./backend_inc/header.php')

?>


                <!-- Page Heading -->
              <h1>Add banner</h1>

        <div class="card">
            <div class="card-header">
                    <h3>Add new banner</h3>
            </div>
                <div class="card-body">

        <form action="../Controller/banner_insert.php" method="post" enctype="multipart/form-data">
                                
                <div class="row align-items-center">
                
                <div class="col-lg-3">

                    <label for="bannerimage">Inser image <br/>
                      
                        <img class="banner_image" style="width: 100%; height:300px; display:block;" src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=" alt="">      
                            <?php
                                if(isset($_SESSION['errors']['file_error'])){

                                ?>
                                    <span class="text-danger"><?=  $_SESSION['errors']['file_error'] ?></span>
                            <?php
                            }
                        ?>
                    </label>
                    <input type="file" class="d-none input_banner" name="file"  id="bannerimage">

                </div>

                <div class="col-lg-9">

                    <label class="w-100">Insert Title <span class="text-danger">*</span>
                    <input type="text" name="title" class="form-control">
                           
                           <?php

                                if(isset($_SESSION['errors']['title_error'])){

                                    ?>
                                    <span class="text-danger"><?=  $_SESSION['errors']['title_error'] ?></span>
                                <?php
                            }
                        ?>
                    </label>

                    <label class="w-100">Insert a video Link <span class="text-danger">*</span>
                    <input type="text" name="link" class="form-control">
                           
                           <?php

                                if(isset($_SESSION['errors']['link_error'])){

                                    ?>
                                    <span class="text-danger"><?=  $_SESSION['errors']['link_error'] ?></span>
                                <?php
                                }
                            ?>
                    </label>

                    <label class="w-100">Description
                    <textarea type="text" name="description" class="form-control"></textarea>
                            
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

unset($_SESSION['errors']);
include('./backend_inc/footer.php')

?>

 <script>

 let $input_banner =   document.querySelector('.input_banner')

 let $banner_image = document.querySelector('.banner_image')

        $input_banner.addEventListener('change', function(e){
           
         let url =   window.URL.createObjectURL(e.target.files[0])

         $banner_image.src = url

        })
    
</script>
