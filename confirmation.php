<?php
$error = false;
/* user */
include_once 'back/database.php';
$page = 'home';
include_once 'inc/header.php'; 

/**
 * @description gets url param for PR
 * @author nicole
 * @param int
 * @return void if not set
 */ 
(int) $confirmation_number = filter_input(INPUT_GET, 'PR', FILTER_SANITIZE_STRING);

if(isset($confirmation_number)){
    
    if (strlen($confirmation_number) < 1 || strlen($confirmation_number) > 11 || !ctype_digit($confirmation_number)) {
        $user->redirect('home');
    }
    
}else{
    $user->redirect('home');
}

?>

  
<div class="row row-offcanvas row-offcanvas-right">
    
    
        <div class="col-12 col-md-9">
            
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          
          
          <br><br>
          
          
            <h2><?= FIRST_NAME; ?>, your application has been submitted.</h2> 
                <h5>Your Confirmation Number : PR-<?= $confirmation_number; ?></h5>
                <hr>  
              <small id="" class="form-text text-muted">Please save this confirmation number to your records. Should you have any questions or concerns regarding your application, please reference this number when prompted. </small>
                
          
          
          
          <div class="row">
              
              <div class="col-12">
                           <br>   <br>
              <b>In order for an application to be processed you must have a photo of your passport attached to your account.</b>
              
                  <br>   <br>
                  <a href="passportid"><button type="button" class="btn btn-primary">Go add a passport &raquo;</button></a>
              
                </div><!--/span-->
            


          </div><!--/row-->
          
          
        </div><!--/-->
    
 

<?php  include_once 'inc/sidebar.php'; ?>
<?php  include_once 'inc/footer.php'; ?>
<script src="assets/js/home.js"></script>
<script language="javascript">
</script> 
	
  </body>
</html>
