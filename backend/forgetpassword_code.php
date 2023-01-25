<?php

        if(isset($_GET['token'])){

            $token = $_GET['token'];

     }

        session_start();
    ?>
        
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
        
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
        
            <title>SB Admin 2 - Login</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <!-- Custom fonts for this template-->
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">
        
            <!-- Custom styles for this template-->
            <link href="css/sb-admin-2.min.css" rel="stylesheet">
        
        </head>
        
        <body class="bg-gradient-primary">
        
        
        
                    <?php 
        
                    if(isset($_SESSION['error'])){
                        
                        ?>
                    <div class="toast show" style="position:absolute; bottom: 1px; right: 120px;" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
        
                    <strong class="me-auto"><h4>Yemmy Foods</h4></strong>
                  
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                    <span class="text-danger"><h5><?= $_SESSION['error'] ?></h5></span>
                    </div>
                    </div>
        
                    <?php
                    }
        
                    ?>
        
        
        
        
            <div class="container">
        
                <!-- Outer Row -->
                <div class="row justify-content-center">
        
                    <div class="col-xl-10 col-lg-12 col-md-9">
        
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                            </div>
                                            <form class="user" action="../Controller/update_password.php" method="POST">
                                               
                                            <input type="hidden" name="token" value="<?= $token ?>">
                                            <div class="form-group">
                                                    <input type="password" name="password" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                                        placeholder="Enter new password...">
        
                                                <?php
                                                        if(isset($_SESSION['errors']['password_errors'])){
                                                    ?>
                                                         <span class="text text-danger"><?= $_SESSION['errors']['password_errors'] ?></span>
                                                    <?php
                                                        }
                                                        ?>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" name="c_password" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                                        placeholder="confirm password...">
        
                                                <?php
                                                        if(isset($_SESSION['errors']['c_password_errors'])){
                                                    ?>
                                                         <span class="text text-danger"><?= $_SESSION['errors']['c_password_errors'] ?></span>
                                                    <?php
                                                        }
                                                        ?>
                                                </div>
                                            
                                                <button type="submit" name="update" class="btn btn-primary btn-user btn-block">
                                                 Password Update
                                                </button>
                                              
                                            </form>
                                           
                                           
                                           
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
        
                </div>
        
            </div>
        
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        
            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>
        
        </body>
        
        </html>
        
        <?php
        
        session_unset();
        
        
        
        
        ?>
        


?>

