<?php

   /**
    * @description Use not logged in intially
    * @author nicole
    * @return class object
    */

define('LOGIN_NOT_REQUIRED', 1);
$error=false;

/**
 * @description When user submits
 * @author nicole
 * @return void
 */
if(isset($_POST['btn-login']))
{
 include_once 'back/database.php';

 //validate
 $umail = $user->basicValidation(filter_var($_POST['txt_uname_email'], FILTER_VALIDATE_EMAIL));
 $upass = $user->basicValidation($_POST['txt_password']);
  
if( strlen($umail) < 3 ||
    strlen($upass) < 3
  ){
 $user->error = "email or password not long enough."; 
}
if( strlen($umail) > 45 ||
    strlen($upass) > 45
  ){
 $user->error = "email or password too long."; 
}  

if(!isset($user->error)){
    if($user->login($umail,$upass))
   {
    $user->redirect('home');
   }
   else
   {
    $user->error = "Login incorrect"; 
   }    
}

}
$page = 'signin';
?>
<?php  include_once 'inc/header.php'; ?>

 
    
<div id="form-box" class="form-box credential-form-container">
<form method="post" id="login-credentials-form" class="form-signin">
    <p align='center'><img src="assets/imgs/logo.png" class="img-responsive logo" /></p>
    
     <h2 class="form-signin-heading">Please log in</h2>
     
     
     <?php
    if(isset($user->error)) {
       echo '<div id="in-warnings" class="alert alert-danger" role="alert">';
       $user->printError();
       $error = true;
       echo '</div>';
   }
   ?>
     
     
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="txt_uname_email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus
               value="<?php if($error){echo $user->basicValidation($_POST['txt_uname_email']);}?>" maxlength="45">
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="txt_password" type="password" id="inputPassword" class="form-control" placeholder="Password" required maxlength="45">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button name="btn-login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    
    



<div>

    
    <br><hr><br>
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Create an Account</h4>
  <hr>
  <p>Don't have an account? <a href="register">Register now</a>.</p>
</div>
                     
            


</form>
</div>

    </main><!--/.container-->



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
     

    