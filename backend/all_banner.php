

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
                                                    
                            <table class="table"> 
                                <thead class="head">
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Description</th>
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
                                        <td>
                                            <a class="btn btn-info" href="./view_banner.php? id= <?= $single_data['id'] ?>">view</a>
                                            <a class="btn btn-primary" href="./edite_banner.php? id= <?= $single_data['id'] ?>">edit</a>
                                            <a class="btn btn-danger" href="../Controller/delete_banner.php? id= <?= $single_data['id'] ?>">delete</a>
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

@include('./backend_inc/footer.php')


?>