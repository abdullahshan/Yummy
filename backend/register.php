
<?php

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

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-gradient-primary">


<?php 

if(isset($_SESSION['success'])){
    
    ?>
<div class="toast show" style="position:absolute; bottom: 20px; right: 125px;" role="alert" aria-live="assertive" aria-atomic="true">
<div class="toast-header">

<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body">
<span class="text-success"><h6><?= $_SESSION['success'] ?></h6></span>
</div>
</div>

<?php
}

?>



    <div class="container">

   

        <div class="card o-hidden border-0 shadow-lg my-5">
            
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <form class="user" method="POST" action="../Controller/Register_user.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">

                                            <?php
                                    if(isset($_SESSION['errors']['fname_error'])){
                                        ?>
                                       
                                        <span class="text text-danger"><?= $_SESSION['errors']['fname_error'] ?></span>

                                        <?php
                                    }

                            ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">

                                            
                                            <?php
                                    if(isset($_SESSION['errors']['lname_error'])){
                                        ?>
                                       
                                        <span class="text text-danger"><?= $_SESSION['errors']['lname_error'] ?></span>
                                        
                                        <?php
                                    }

                            ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email"  class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">

                                        
                                        <?php
                                    if(isset($_SESSION['errors']['email_error'])){
                                        ?>
                                       
                                        <span class="text text-danger"><?= $_SESSION['errors']['email_error'] ?></span>
                                        
                                        <?php
                                    }

                            ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">

                                            
                                            <?php
                                    if(isset($_SESSION['errors']['password_error'])){
                                        ?>
                                       
                                        <span class="text text-danger"><?= $_SESSION['errors']['password_error'] ?></span>
                                        
                                        <?php
                                    }

                            ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" name="conpassword" placeholder="Repeat Password">
                                   
                                            
                                            <?php
                                    if(isset($_SESSION['errors']['conpassword_error'])){
                                        ?>
                                       
                                        <span class="text text-danger"><?= $_SESSION['errors']['conpassword_error'] ?></span>
                                        
                                        <?php
                                    }

                            ?>
                                   
                                        </div>
                                </div>
                                <button type="submit" name="Register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                               
                               
                                
                            </form>
                           
                            
                            <div class="text-center">
                                <a class="small" href="./login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

 unset($_SESSION['success']);
 unset($_SESSION['errors']);     

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>