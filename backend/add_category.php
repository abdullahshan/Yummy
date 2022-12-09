

    <style>

.table thead{
    background-color: black;
}
.table thead th{
    font-size: 20px;
}
#toast{
    right: 50px;
    position: absolute;
}
</style>

 <?php 

include('./backend_inc/header.php');

?>
<div class="card">


    <!----toast--message---->
                    <?php                                 
                       
                       if(isset($_SESSION['store'])){
                                                            
                                ?>
                                                                                                        
                                <div class="toast show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                <strong class="me-auto text-info">Yummy Foods</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                <span class="text-success"><h5><?= $_SESSION['store'] ?></h5></span>
                                </div>
                                </div>
                                                            
                                <?php
                                }
                                                            
                                ?>      

    <div class="card-header">
        <h3>Add Category</h3>
    </div>
        <div class="card-body">

            <form action="../Controller/store_category.php" method="POST">
              <div class="row" style="width: 500px; margin:auto;">
              <label class="w-100" for="">Category Title <br/>
              </label>
               <input type="text" name="category" class="form-control" placeholder="Enter your category">

               <button type="submit" name="submit" class="btn btn-primary w-100 mt-3">Submit</button>

              </div>
            </form>
    
        </div>
</div>



<!-- All Category -->


<?php

include("../database/env.php");

$query = "SELECT * FROM category";
    $exicute = mysqli_query($conn,$query);
        $all_data = mysqli_fetch_all($exicute,1);

        // print_r($all_data);

?>



                <div class="card mt-5">

                                <?php
                                                            
                                    if(isset($_SESSION['success'])){
                                    
                                        ?>
                                                                                
                                            <div class="toast show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                            <strong class="me-auto text-primary">Yummy Foods</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body">
                                            <span class="text-success"><h5> <?= $_SESSION['success'] ?></h5></span>
                                            </div>
                                            </div>
                                    
                                            <?php
                                            }
                                    
                                        ?>


                    <div class="card-header">
                        <h2>All Categories</h2>
                    </div>
                        <div class="card-body">
                                                    
                            <table class="table w-100"> 
                                <thead class="head">
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                    foreach($all_data as $key=> $sdata){
                                        ?>
                                        <tr>
                                            <td>
                                                <?= ++$key ?>
                                            </td>
                                            <td>
                                                <?= $sdata['title'] ?>
                                            </td>
                                            <td>
                                                <span class="badge <?= $sdata['status']==1 ? "badge-info" : "badge-danger" ?>"><?=  $sdata['status']==1 ? "Active" : "De-active" ?></span>
                                            </td>
                                            <td>
                                                <a class="btn <?= $sdata['status']==1 ? "btn-danger" : "btn-info" ?>" href="../Controller/updata_categorystatus.php? id= <?= $sdata['id'] ?> && status= <?= $sdata['status'] ?> "><?= $sdata['status']==1 ? "De-active" : "Active"?></a>
                                                <a class="btn btn-primary" href="./edite_category.php? id= <?= $sdata['id'] ?> && title= <?= $sdata['title'] ?>">edit</a>
                                                <a class="btn btn-danger delete_btn" href="../Controller/delete_category.php? id= <?= $sdata['id'] ?>">delete</a>
                                            </td>
                                         </tr>

                                         <?php  
                                    }

                                ?>

                                </tbody>
                            </table>

                            <?php

                            if($all_data == false){
                            ?>
                                <span class="text-danger"><h1>Data Not Found!</h1></span>
                                <?php
                            }

                            ?>
                        
                    </div>
                </div>



<?php

@include('./backend_inc/footer.php');

unset($_SESSION['success']);

unset($_SESSION['store']);


?>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    let delete_btn = document.querySelectorAll('.delete_btn');


                let count_deletebtn = delete_btn.length

                for(i = 0; i < count_deletebtn; i++ ){
           
                    // console.log(i);
                    

                    delete_btn[i].addEventListener('click', function(e){

                        let url = e.target.href

                    e.preventDefault();


                    Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire(
                    // 'Deleted!',
                    // 'Your file has been deleted.',
                    // 'success'
                    // )
                    window.location = url
                }
                })

});
                }
      



</script>