<?php
$error = false;
$success = false;
/* user */
include_once 'back/database.php';
/* css */
$page = 'home';
/* when posted form */
include_once 'front/post-account.php';
/* header html */
include_once 'inc/header.php'; 

/**
 * @description Update changes to account
 * @author nicole
 * @return void 
 */ 

$url = $_SERVER['REQUEST_URI'];
$notice = parse_url($url, PHP_URL_QUERY);

if($notice == "success"){
    $success = true;
}
?>

  <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage my account</li>
  </ol>
</nav>


<div class="row row-offcanvas row-offcanvas-right">
    
<div class="col-12 col-md-9">

  <p class="float-right d-md-none">
    <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>

  
<h2>Account Preferences</h2> 
    <h5>Manage your account information</h5>
    <hr>  
  <small id="" class="form-text text-muted">Please save this confirmation number to your records. Should you have any questions or concerns regarding your application, please reference this number when prompted. </small>
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
       . '<div style=float:right><a href="myaccount"><span style=color:green>CLOSE</span></a></div></div>';
   }
?>
          
<br>
<div class="row">
<div class="col-12">
                  
                  
<form method="post">
    
    <h4>Account Settings</h4>
    <br>
     
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input name="staticEmail" type="text" disabled class="form-control" value="<?= USER_EMAIL; ?>">
    </div>
  </div>
    
    
  <hr>
    
   <div class="form-group row">
    <label for="staticPassword" class="col-sm-3 col-form-label">New Password</label>
    <div class="col-sm-9">
      <input name="staticPassword" type="password" class="form-control" value="" placeholder="Password">
    </div>
  </div>
    
     <div class="form-group row">
    <label for="staticConfirmPassword" class="col-sm-3 col-form-label">Confirm New Password</label>
    <div class="col-sm-9">
      <input name="staticConfirmPassword" type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div> 
    
    <hr>
    
    
       <div class="form-group row">
    <label for="staticFirst" class="col-sm-3 col-form-label">First Name</label>
    <div class="col-sm-9">
      <input name="staticFirst" type="text" class="form-control" value="<?= FIRST_NAME; ?>" placeholder="Enter First Name">
    </div>
  </div>
    
     <div class="form-group row">
    <label for="staticLast" class="col-sm-3 col-form-label">Last Name</label>
    <div class="col-sm-9">
      <input name="staticLast" type="text" class="form-control" value="<?= LAST_NAME; ?>" placeholder="Enter Last Name">
    </div>
  </div> 
    
    <br>
      <h4>Payment Information</h4>
     <br>
  
     
  <div class="form-group row">
    <label for="staticCCType" class="col-sm-3 col-form-label">Credit Card Type</label>
    <div class="col-sm-4">
      <select name="staticCCType" class="form-control">
        <option selected value="Visa">Visa</option>
        <option value="Mastercard">Mastercard</option>
         <option value="AMEX">American Express</option>
      </select>
    </div>

  </div>    
     
     
     
<div class="form-group row">
    <label for="staticCCNumber" class="col-sm-3 col-form-label">Credit Card Number</label>
    <div class="col-sm-9">
        <input name="staticCCNumber" type="text" class="form-control" id="inputPassword" placeholder="" maxlength="16">
    </div>
  </div>  
     
<div class="form-group row">
    <label for="staticExpiry" class="col-sm-3 col-form-label">Expiry Date</label>
    <div class="col-sm-4">
      <select name="staticExpiryMonth" class="form-control">
        <option selected value="">Month</option>
        <option value="01">01</option>
         <option value="02">02</option>
         <option value="03">03</option>
         <option value="04">04</option>
         <option value="05">05</option>
         <option value="06">06</option>
         <option value="07">07</option>
         <option value="08">08</option>
         <option value="09">09</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
      </select>
    </div>
    <div class="col-sm-4">
      <select name="staticCCExpiryYear" class="form-control">
        <option selected value="">Year</option>
        <option value="2017">2017</option>
         <option value="2018">2018</option>
         <option value="2019">2019</option>
         <option value="2020">2020</option>
         <option value="2021">2021</option>
         <option value="2022">2022</option>
         <option value="2023">2023</option>
         <option value="2024">2024</option>
         <option value="2025">2025</option>
      </select>
    </div>
    
  </div> 
     
  <div class="form-group row">
    <label for="staticCCCVV" class="col-sm-3 col-form-label">CVV</label>
    <div class="col-sm-3">
        <input name="staticCCCVV" type="text" class="form-control" id="inputPassword" placeholder="" maxlength="3">
    </div>
    <div class="col-sm-6">
        <small id="" class="form-text text-muted">This is the 3 digit number on the back of the card</small>
    </div>
  </div>     
     
     
     
    <br>
    <hr>
     <br>     
     
<button name="btn_save" type="submit" class="btn btn-primary">Save Changes</button>
              
</form>
                  
                  
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
