<?php
define('LOGIN_NOT_REQUIRED', 1);

include_once 'front/post-register.php';
$page = 'signin';
?>
<?php  include_once 'inc/header.php'; ?>



<div id="form-box" class="form-box credential-form-container">


  <form method="post" id="register-credentials-form" class="form-register">
      
      
    <p align='center'><img src="assets/imgs/logo.png" class="img-responsive logo" /></p>
    <h2>Create an account</h2>

     <?php
    if(isset($user->error)) {
       echo '<div id="in-warnings" class="alert alert-danger" role="alert">';
       $user->printError();
       $error = true;
       echo '</div>';
   }else{
      $error=false;
    }
   ?>
    
           <label for="inputFirst" class="sr-only">First Name</label>
        <input name="txt_first" type="text" id="inputFirst" class="form-control" placeholder="First Name" required autofocus
               value="<?php if($error){echo $user->basicValidation($_POST['txt_first']);}?>" maxlength="45">
        
               <label for="inputLast" class="sr-only">Last Name</label>
        <input name="txt_last" type="text" id="inputLast" class="form-control" placeholder="Last Name" required autofocus
               value="<?php if($error){echo $user->basicValidation($_POST['txt_last']);}?>" maxlength="45">
    
           <label for="inputEmail" class="sr-only">Email address</label>
        <input name="txt_umail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus
               value="<?php if($error){echo $user->basicValidation($_POST['txt_umail']);}?>" maxlength="45">
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="txt_upass" type="password" id="inputPassword" class="form-control" placeholder="Password" required maxlength="45">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button name="btn-signup" class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>


<div>

    
    <br><hr><br>
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Log In</h4>
  <hr>
  <p>Already have an account? <a href="log-in">Log in now</a>.</p>
</div>
    
    


</form>
</div>

    </main><!--/.container-->



    <script src="assets/js/register.js" ></script>
    <script src="assets/js/jquery321.js" ></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
    $(function () {
  'use strict'

  $('[data-toggle="offcanvas"]').on('click', function () {
    $('.row-offcanvas').toggleClass('active')
  })
})
</script>
  </body>
</html>
