
 <?php 

    @include('./backend_inc/header.php')

?>





<?php 
if(isset($_SESSION['success'])){
    
    ?>
    
<div class="toast show" style="bottom: 50px; right: 50px; position:absolute;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
 
    <strong class="me-auto">Yemmy Food</strong>
   
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <span class="text-success"><?= $_SESSION['success'] ?></span>
  </div>
</div>
<?php
}

?>






                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Welcome to our deshboard   <?=  isset($_SESSION['auth']) ? $_SESSION['auth']['f_name']. ' ' . $_SESSION['auth']['l_name'] :'akasher tara' ?></h1>







                    
<?php

@include('./backend_inc/footer.php')

?>