<?php 

include("./backend_inc/header.php");
include("../database/env.php");

$id = $_REQUEST['id'];


$query = "SELECT * FROM event WHERE id = '$id'";

    $exicute = mysqli_query($conn,$query);

        $data = mysqli_fetch_assoc($exicute);

?>


    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Update Event Post</h1>
            </div>
            <div class="card-body">

            <form action="../Controller/update_event.php? id= <?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="row align-items-center">
                
                <div class="col-lg-3">
                    <label for="event_image" class="w-100%">Update event image <br/>
                        <img style="position:absulate; width: 100%; border-radius:15px;" src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=" alt="">
                            
                    </label>

                        <?php 

                        if(isset($_SESSION['error']['error_img_image'])){
                            ?>

                            <span class="text-denger"><?= $_SESSION['error']['error_img_image'] ?></span>
                            <?php
                        }

                        ?>

                    <input type="file" class="d-none" name="image" id="event_image">
                </div>
               

                <div class="col-lg-9">

                    <label class="w-100">Title <span class="text-danger">*</span>
                    <input value="<?=  $data['title'] ?>" type="text" name="title" class="form-control">

                    </label>

                    <label class="w-100">Price <span class="text-danger">*</span>
                    <input value="<?= $data['price'] ?>" type="text" name="price" class="form-control">

                    </label>

                    <label class="w-100">Description
                    <textarea type="text" name="description" class="form-control">
                       <?= $data['description']  ?>    
                    </textarea>

                    </label>

                </div> 
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  
</form>

            </div>
        </div>
    </div>


<?php 
include("./backend_inc/footer.php");

unset($_SESSION['error']);

?>