
<?php

include("./backend_inc/header.php");

include("../database/env.php");



$query = "SELECT * FROM foods";
    $exicute = mysqli_query($conn,$query);

        $data = mysqli_fetch_all($exicute,1);


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
        <h1>All Food</h1>
    </div>
        <div class="card-body" style="margin: auto;">

            <table class="table table-responsive">
                <div class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Catgory_id</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </div>
                <div class="tbody">
                    <?php
                    foreach($data as $key=> $sdata){
                        ?>

                        <tr>
                        <td><?=  ++$key  ?></td>
                        <td><img style="width:100px;" src="../upload/food/<?= $sdata['image'] ?>" alt=""></td>
                        <td><?= $sdata['title'] ?></td>
                        <td><?= $sdata['description'] ?></td>
                        <td><?= $sdata['price']  ?></td>
                        <td><?= $sdata['category_id'] ?></td>
                        <td><span class="badge <?= $sdata['status'] == 0 ? "badge-danger" : "badge-info" ?>"><?= $sdata['status'] == 0 ? "De-active" : "Active"?></span></td>
                        <td>
                            <a class="btn <?= $sdata['status'] == 1 ? "btn-danger" : "btn-info" ?>" href="../Controller/food_status.php? id= <?= $sdata['id'] ?> "><?= $sdata['status'] == 0 ? "Active" : "De-active" ?></a>
                            <a class="btn btn-primary" href="./edite_food.php? id= <?= $sdata['id'] ?>">edit</a>
                            <a class="btn btn-danger delete_btn" href="../Controller/delete_food.php? id= <?= $sdata['id'] ?>">delete</a>
                        </td>
                    </tr>
                    <?php
                    }

            ?>
                </div>
            </table>

        </div>
</div>


<?php


include("./backend_inc/footer.php");
unset($_SESSION['success']);


?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    let delete_btn = document.querySelectorAll('.delete_btn');

        let count_deletebtn = delete_btn.length;

        for(i = 0; i < count_deletebtn; i++ ){

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