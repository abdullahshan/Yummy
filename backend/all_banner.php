

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

        include("../database/env.php");




 $query = "SELECT * FROM banner";

    $data = mysqli_query($conn, $query);

        $all_data =  mysqli_fetch_all($data, 1);

    //    var_dump($all_data);

    //     @exit;

    ?>


                <div class="card">

                    <?php
                                                            
                        if(isset($_SESSION['success'])){

                    ?>
                                            
                            <div class="toast show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                            <strong class="me-auto">Yummy Foods</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                            <span class="text-success"> <?= $_SESSION['success'] ?></span>
                            </div>
                            </div>

                        <?php
                            }

                        ?>

                    <div class="card-header">
                        <h3>All banner</h3>
                    </div>
                        <div class="card-body">
                                                    
                            <table class="table w-100"> 
                                <thead class="head">
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                        foreach($all_data as $key=>$single_data){
                                        ?>
                                        <tr>
                                        <td><?= ++$key ?></td>
                                        <td><img src="../upload/banner/<?= $single_data['banner_image'] ?>" width="100px" height="100px" alt=""></td>
                                        <td><?= $single_data['title'] ?></td>
                                        <td><a href="<?= $single_data['link'] ?>"><?= $single_data['link'] ?></a></td>
                                        <td><?= strlen($single_data['description']) > 30 ? substr($single_data['description'], 0, 30).'.....' : $single_data['description'] ?></td>
                                        <td><span class="badge <?=  $single_data['status'] !=0 ? "badge-info" : "badge-danger" ?>"><?=  $single_data['status'] !=0 ? "Active" : "De-active" ?></span></td>
                                        <td>
                                            <a class="btn <?=  $single_data['status']==0 ? "btn-info" : "btn-danger" ?>" href="../Controller/update_status.php? id= <?= $single_data['id'] ?>"><?= $single_data['status'] !=0 ? "De-active" : "Active" ?></a>
                                            <a class="btn btn-info" href="./view_banner.php? id= <?= $single_data['id'] ?>">view</a>
                                            <a class="btn btn-primary" href="./edite_banner.php? id= <?= $single_data['id'] ?>">edit</a>
                                            <a class="btn btn-danger deletebtn" href="../Controller/delete_banner.php? id= <?= $single_data['id'] ?>">delete</a>
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

unset($_SESSION['success']);

@include('./backend_inc/footer.php')


?>





<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

    let deletebtn =   document.querySelectorAll('.deletebtn')

    let count_deletebtn = deletebtn.length

        for(i = 0; i < count_deletebtn; i++ ){
           
            deletebtn[i].addEventListener('click', function(e){
                
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

                        window.location = url
                        // Swal.fire(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )
                    }
                    })



             
            })
        }              
    
</script>