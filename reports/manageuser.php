<?php

/**
 * @description Manage a user account
 * @author nicole
 * @return page
 */

include_once '../back/reports.php';
include_once 'inc/load-user.php';

?>
<?php  include_once 'template/header.php'; ?>
<?php  include_once 'template/sidebar.php'; ?>
   
 <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            
 <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Home</a></li>
     <li class="breadcrumb-item"><a href="allusers">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage User</li>
  </ol>
</nav>

<h1>Manage User</h1>


    <h5>User ID : <?= U_ID; ?></h5>
    <hr>  
  <small id="" class="form-text text-muted">Any changes to a user's account must be emailed to them.</small>
<br>
<?php
    if(isset($user->error)) {
       echo '<div class="alert alert-danger" role="alert">';
       $user->printError();
       $error = true;
       echo '</div>';
   }
   if($success) {
       echo '<div class="alert alert-success" role="alert">Changes Saved.  '
       . '<div style=float:right><a href="manageuser?id='.U_ID.'"><span style=color:green>CLOSE</span></a></div></div>';
   }
?>
          
<br>
<div class="row">
<div class="col-12">
                  
                  
<form method="post">
    
    <h4>Account Settings</h4>
    <br>
     
  <div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input name="form_email" type="text" disabled class="form-control" value="<?= U_EMAIL; ?>">
    </div>
  </div>
    
    
  <hr>
    
   <div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">New Password</label>
    <div class="col-sm-3">
      <input id="gen-pass" name="gen_pass" readonly  type="text" class="form-control" value="" placeholder="">
    </div>
    <div class="col-sm-3">
        <button id="btn_gen" name="btn_gen" type="button" onclick='document.getElementById("gen-pass").value = Password.generate(16)' class="btn btn-primary">
            Generate New Password</button>
    </div>
  </div>
    
    
    <hr>
    
    
       <div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">First Name</label>
    <div class="col-sm-9">
      <input name="form_first" type="text" class="form-control" value="<?= U_FIRST; ?>" placeholder="Enter First Name">
    </div>
  </div>
    
     <div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">Last Name</label>
    <div class="col-sm-9">
      <input name="form_last" type="text" class="form-control" value="<?= U_LAST; ?>" placeholder="Enter Last Name">
    </div>
  </div> 
    
    <hr>
       
  <div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">Role</label>
    <div class="col-sm-4">
      <select name="form_role" class="form-control">
        <option <?php if(U_ROLE=='USER'):echo 'selected'; endif;?> value="USER">User</option>
        <option <?php if(U_ROLE=='ADMIN'):echo 'selected'; endif;?> value="ADMIN">Admin</option>
      </select>
    </div>
  </div>    
     
      <hr>
    
     
<div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">Date Added</label>
    <div class="col-sm-9">
        <?= U_DATE; ?>
    </div>
  </div>  
     

      
<div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">Last Login</label>
    <div class="col-sm-9">
        <?= U_LASTLOGIN; ?>
    </div>
  </div>  
        
        
<div class="form-group row">
    <label for="" class="col-sm-3 col-form-label">Contact</label>
    <div class="col-sm-9">
        <a href="message?e=<?= U_EMAIL; ?>"><button name="" type="button" class="btn btn-primary">Message User</button></a>
       <button name="" type="button" class="btn btn-primary">Email User</button>
    </div>
  </div>  
           
     
    <br>
    <hr>
     <br>     
     
<button name="btn_save" type="submit" class="btn btn-primary">Save Changes</button>
        
</form>
                  
                  
</div>

</main>
<script src="../assets/js/password.js" /></script>

<?php  include_once 'template/footer.php'; ?>