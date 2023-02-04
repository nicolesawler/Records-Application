<?php

/**
 * @description Send message
 * @author nicole
 * @return page
 */

include_once '../back/reports.php';
include_once '../back/messages.php';

include_once 'inc/post-message.php';
?>
<?php  include_once 'template/header.php'; ?>
<?php  include_once 'template/sidebar.php'; ?>
   
 <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            
 <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Send Message</li>
  </ol>
</nav>

<h1>Message Centre</h1>


    <h5>Message single user, or all users</h5>
    <hr>  
  <small id="" class="form-text text-muted"></small>
<br>
<?php
    if(isset($user->error)) {
       echo '<div class="alert alert-danger" role="alert">';
       echo $user->error;
       $error = true;
       echo '</div>';
   }
   if($msgsuccess) {
       echo '<div class="alert alert-success" role="alert">Your message has been posted.  '
       . '<div style=float:right><a href="message"><span style=color:green>CLOSE</span></a></div></div>';
   }
?>
          
<br>
<div class="row">
<div class="col-12">
                  
                  
<form method="post">
    
    <h4>Message</h4>
    <br>
     
  <div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">User Email</label>
    <div class="col-sm-9">
        <input name="msg_email" type="text" class="form-control" value="<?php if(isset($email)){echo $email;}?>" placeholder="Leave blank to message all users">
    </div>
  </div>
   
   <div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">Subject</label>
    <div class="col-sm-9">
        <input name="msg_subject" type="text" class="form-control" value="<?php if($error){echo $subject;}?>" placeholder="">
    </div>
  </div>

    
   <div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">Message</label>
    <div class="col-sm-9">
        <textarea name="msg_message" type="text" class="form-control" rows="12" ><?php if($error){echo $message;}?></textarea>
    </div>

  </div>


<button name="btn_send_message" type="submit" class="btn btn-primary">Send Message</button>   
</form>
<br><hr><br>
</div>
</main>
<?php  include_once 'template/footer.php'; ?>
   