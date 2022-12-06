
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
include("./backend_inc/header.php");

    include("../database/env.php");

        $_query = "SELECT * FROM event";

            $exicute = mysqli_query($conn,$_query);

             $data =  mysqli_fetch_all($exicute,1);

?>


    <div class="card">


    <?php

if(isset($_SESSION['success'])){
?>
    
<div style="position:absolute; right:20px;" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
  
    <strong class="me-auto"><h4><b>Yummy Food</b></h4></strong>
    
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <SPAn class="text-success"><h5><?= $_SESSION['success'] ?></h5></SPAn>
  </div>
</div>
<?php
}

?>


        <div class="card-header">
            <h1>All events</h1>
        </div>
            <div class="card-body">
                
                    <table class="table w-100">
                        <thead class="header">
                              <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                        </thead>
                        <tbody>
                          <?php 

                            foreach($data as $key=>$s_data){
                                ?>

                              <tr>
                                <td><?= ++$key ?></td>
                                <td><img style="height:150" src="../upload/event/<?= $s_data['image'] ?>" alt=""></td>
                                <td><?= $s_data['title'] ?></td>
                                <td><?= $s_data['price'] ?></td>
                                <td><?= $s_data['description'] ?></td>
                                <td><span class="badge <?= $s_data['status'] == 0 ? "badge-danger" : "badge-success" ?>"><?= $s_data['status']==0 ? "De-active" : "Active" ?></span></td>
                                <td>
                                    <a href="../Controller/update_event_satatus.php? id= <?= $s_data['id'] ?>"><span class="btn <?= $s_data['status'] == 0 ? "btn-success" : "btn-danger" ?>"><?= $s_data['status'] == 0 ? "Active" : "De-active" ?></span></a>
                                    <a class="btn btn-primary" href="./event_edite.php? id= <?= $s_data['id']?> ">edit</a>
                                    <a class="btn btn-danger delete_btn" href="../Controller/delete_event.php? id= <?= $s_data['id'] ?>">delete</a>
                                </td>
                              </tr>

                              <?php
                            }

                        ?>
                        </tbody>
                    </table>

            </div>
    </div>

<?php
unset($_SESSION['success']);
include("./backend_inc/footer.php");


?>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

    let delete_btn = document.querySelectorAll('.delete_btn');

  
    let length = delete_btn.length

            for(i = 0; i < length; i++){

                // console.log(i)
                delete_btn[i].addEventListener('click', function(e){

                    e.preventDefault();
                    let url = e.target.href                 

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
                })
             
              
            }

</script>