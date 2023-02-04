<?php
$error = false;
/* user */
include_once 'back/database.php';
$page = 'home';
include_once 'inc/header.php'; 

/**
 * @description Page not found
 * @author nicole
 */ 
//TEST

?>

  
<div class="row row-offcanvas row-offcanvas-right">  
<div class="col-12 col-md-9">

  <p class="float-right d-md-none">
    <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>
          
<br><br>
          
<h2>Sorry <?= FIRST_NAME; ?>, this page doesn't exist.</h2> 
<h5>One way or another you came across this page, but don't worry, you have options!</h5>
<hr>  
<small id="" class="form-text text-muted">Use the menu to your right, to redirect you where you want to go. </small>
                
          
<div class="row">
              
<div class="col-12">
    <br>
    <a href="home"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>

  </div><!--/span-->
            

</div><!--/row-->
</div><!--/-->
    
 

<?php  include_once 'inc/sidebar.php'; ?>
<?php  include_once 'inc/footer.php'; ?>
</body>
</html>
