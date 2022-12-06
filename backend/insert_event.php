<?php 

include("./backend_inc/header.php");


?>


    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Add Event</h1>
            </div>
            <div class="card-body">

            <form action="../Controller/insert_event.php" method="POST" enctype="multipart/form-data">
            <div class="row align-items-center">
                
                <div class="col-lg-3">
                    <label for="event_image" class="w-100%">Insert event image <br/>
                        <img class="event_image" style="width: 100%; height:300px; display:block;" src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=" alt="">
                      
                      <?php
                            if(isset( $_SESSION['errors']['error_image'])){
                                ?>
                                <span class="text-danger"><?=  $_SESSION['errors']['error_image'] ?></span>
                                <?php
                            }
                            ?>

                    </label>
                    <input type="file" class="d-none input_event" name="image" id="event_image">
                </div>
               

                <div class="col-lg-9">

                    <label class="w-100">Title <span class="text-danger">*</span>
                    <input type="text" name="title" class="form-control input_event">

                            <?php
                            if(isset( $_SESSION['errors']['error_title'])){
                                ?>
                                <span class="text-danger"><?=  $_SESSION['errors']['error_title'] ?></span>
                                <?php
                            }
                            ?>

                    </label>

                    <label class="w-100">Price <span class="text-danger">*</span>
                    <input type="text" name="price" class="form-control">

                    <?php
                            if(isset( $_SESSION['errors']['error_price'])){
                                ?>
                                <span class="text-danger"><?=  $_SESSION['errors']['error_price'] ?></span>
                                <?php
                            }
                            ?>
                           
                    </label>

                    <label class="w-100">Description
                    <textarea type="text" name="description" class="form-control"></textarea>

                    <?php
                            if(isset( $_SESSION['errors']['error_description'])){
                                ?>
                                <span class="text-danger"><?=  $_SESSION['errors']['error_description'] ?></span>
                                <?php
                            }
                            ?>

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

unset($_SESSION['errors']);


?>

<script>

    let input_event = document.querySelector('.input_event')

    let event_image = document.querySelector('.event_image')


        input_event.addEventListener('change', function(e){

            // console.log(e.target)
            // console.log(e.target.files)
            // console.log(e.target.files['0'])
    let url = window.URL.createObjectURL(e.target.files['0'])
            
    // console.log(url)
            event_image.src = url

        })

</script>