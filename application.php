<?php
/* no errors by default */
$error = false;
/* default country for js */
$country = "Country";
/* user must be logged in */
include_once 'back/database.php';
/* when posted form */
include_once 'front/post-application.php';
/* header html */
include_once 'inc/header.php';
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Police Record Application</li>
  </ol>
</nav>

<div class="row row-offcanvas row-offcanvas-right">

    
<div class="col-12 col-md-9">
  <p class="float-right d-md-none">
    <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>


<h2>Police Record Application</h2> 
<h5>Royal Turks and Caicos Islands Police Force Certificate of Character</h5>
<small id="" class="form-text text-muted">Serial Number: ncib03ol/2017 </small>
<hr>  

<div class="row">
<div class="col-12"> 
    
<form method="post">

<?php
    if(isset($user->error)) {
       echo '<div id="in-warnings" class="alert alert-danger" role="alert">';
       $user->printError();
       $error = true;
       echo '</div>';
   }
?>
 <div class="row">
      
      
        <div class="col-5">
            <div class="form-group">
               <label for="firstname">First Name</label>
               <input name="first" type="text" class="form-control" value="<?php if($error):echo $first; endif; ?>" placeholder="First Name">
             </div> 
        </div>
          <div class="col-2">
            <div class="form-group">
               <label for="firstname">Middle Initial</label>
               <input name="middle" type="text" class="form-control" value="<?php if($error):echo $m; endif; ?>" placeholder="M">
             </div> 
        </div>

        <div class="col-5">
        <div class="form-group">
           <label for="lastname">Last Name</label>
           <input name="last" type="text" class="form-control" value="<?php if($error):echo $last; endif; ?>" placeholder="Last Name">
         </div> 
        </div>
     
  </div> 
  
    <div class="row">
  
          <div class="col-12">
            <div class="form-group">
               <label for="surname">Is your Surname different from your current name?</label>
               <input name="surname" type="checkbox" class="form-control formercheckbox" value="<?php if($error):echo 'checked'; endif; ?>">
             </div> 
        </div>
  
  
   </div> 

  
  <div id="former-information" class="former-information">
    <h5>Former Information</h5>
    <div class="row">
      
        
        <div class="col-5">
            <div class="form-group">
               <label for="firstname">Former First Name</label>
               <input name="ffirst" type="text" class="form-control" value="<?php if($error):echo $ffirst; endif; ?>" placeholder="First Name">
             </div> 
        </div>
          <div class="col-2">
            <div class="form-group">
               <label for="firstname">Middle Initial</label>
               <input name="fmiddle" type="text" class="form-control" value="<?php if($error):echo $fm; endif; ?>" placeholder="M">
             </div> 
        </div>

        <div class="col-5">
        <div class="form-group">
           <label for="lastname">Former Last Name</label>
           <input name="flast" type="text" class="form-control" value="<?php if($error):echo $flast; endif; ?>" placeholder="Last Name">
         </div> 
        </div>
     
  </div> 
  </div><!-- former -->
    

    <br>
      <div class="row">
      
       <div class="col-4">
        <div class="form-group">
           <label for="lastname">Birth Country</label>
           <select id="country" name="country" class="form-control">
               <?php if($error): ?>
               <option selected value="<?= $country; ?>"><?= $country; ?></option>
               <?php endif; ?>
           </select>

         </div> 
        </div>
          
        <div class="col-2">
        <div class="form-group">
           <label for="lastname">Gender</label>
               <select name="gender" class="form-control" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <option <?php if($error && $gender == 'F'):echo 'selected'; endif; ?> value="F">Female</option>
                  <option <?php if($error && $gender == 'M'):echo 'selected'; endif; ?> value="M">Male</option>
              </select>
         </div> 
        </div>

        <div class="col-3">
        <div class="form-group">
           <label for="birthday">Date of Birth</label>
               <input name="birthday" type="date" class="form-control" value="<?php if($error):echo $birthday; endif; ?>">
         
         </div> 
        </div>
          
        <div class="col-3">
        <div class="form-group">
           <label for="phone">Contact Number</label>
                <input name="phone" type="text" class="form-control" value="<?php if($error):echo $phone; endif; ?>" placeholder="+00-123-456-7890">
         
         </div> 
        </div>
 

          
  </div> 
 <br>
 
 <div class="row">
      
      <div class="col-12">
        <div class="form-group">
           <label for="address">Current Address (Street, City, Province, Postal Code)</label>
           <input name="address" type="text" class="form-control" value="<?php if($error):echo $address; endif; ?>" placeholder="Address">
         </div> 
        </div> 
     
 </div>  
 <div class="row">

         <div class="col-12">
        <div class="form-group">
           <label for="faddress">Former Address</label>
           <input name="faddress" type="text" class="form-control" value="<?php if($error):echo $faddress; endif; ?>" placeholder="Address">
         </div> 
        </div>  
           
  </div>    
  <div class="row">

         <div class="col-4">
        <div class="form-group">
            <label for="methodoftravel">Method of Transportation</label><br>
            <label class="radio-inline">
                <input type="radio" name="methodoftravel" <?php if($error && $methodoftravel == 'Air'){echo 'checked'; }else{echo 'checked';} ?> value="Air"> Air</label> &nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="methodoftravel" <?php if($error && $methodoftravel == 'Air'):echo 'checked'; endif; ?> value="Sea"> Sea</label>
         </div> 
        </div>  
      
       <div class="col-6">
        <div class="form-group">
           <label for="lastname">Date of Arrival</label>
           <input name="arrival" type="date" class="form-control" value="<?php if($error):echo $arrivaldate; endif; ?>" placeholder="">
         </div> 
        </div>  
           
  </div> 

 
 
 <br>
       <h5>Legal &amp; Passport Information</h5><br>
       
   <div class="row">
    
         <div class="col-4">
        <div class="form-group">
           <label for="lastname">Passport Number</label>
           <input name="passport" type="text" class="form-control" value="<?php if($error):echo $passportnum; endif; ?>" placeholder="Enter passport #">
         </div> 
        </div>  
      
       <div class="col-4">
        <div class="form-group">
           <label for="lastname">Issued Date</label>
           <input name="passportissued" type="date" class="form-control" value="<?php if($error):echo $passportissue; endif; ?>" placeholder="">
         </div> 
        </div>  
       
       <div class="col-4">
        <div class="form-group">
           <label for="lastname">Expiry Date</label>
           <input name="passportexpiry" type="date" class="form-control" value="<?php if($error):echo $passportexpiry; endif; ?>" placeholder="">
         </div> 
        </div>  
       
           
  </div>      
    
       <div class="row">
    
         <div class="col-4">
        <div class="form-group">
           <label for="lastname">Legal Status Number</label>
           <input name="legalnum" type="text" class="form-control" value="<?php if($error):echo $legalnum; endif; ?>" placeholder="Enter legal status #">
         </div> 
        </div>  
      
       <div class="col-4">
        <div class="form-group">
           <label for="lastname">Issued Date</label>
           <input name="legalissue" type="date" class="form-control" value="<?php if($error):echo $legalissue; endif; ?>" placeholder="">
         </div> 
        </div>  
       
       <div class="col-4">
        <div class="form-group">
           <label for="lastname">Expiry Date</label>
           <input name="legalexpiry" type="date" class="form-control" value="<?php if($error):echo $legalexpiry; endif; ?>" placeholder="">
         </div> 
        </div>  
       
           
  </div>  
 
 
       <div class="row">
    
         <div class="col-6">
        <div class="form-group">
           <label for="lastname">Occupation</label>
           <input name="occupation" type="text" class="form-control" value="<?php if($error):echo $occupation; endif; ?>" placeholder="Your Job Title">
         </div> 
        </div>  
      
       <div class="col-6">
        <div class="form-group">
           <label for="lastname">Place of Employment</label>
           <input name="employment" type="text" class="form-control" value="<?php if($error):echo $placeofemployment; endif; ?>" placeholder="Company Name">
         </div> 
        </div>  
       
       
           
  </div> 
       
       <br> 
       <h6>Please note that ALL applicants (including Turks and Caicos Islanders) MUST have resided within the Turks and Caicos Islands for a period of six (6) months or more prior to applying for a Police Record.</h6>    
       <br>
       
       
       
<div class="row">

<div class="col-12">
<div class="form-group">
<label for="lastname">Reason for Departure</label>
<textarea name="remarks" value="<?php if($error):echo $remarks; endif; ?>" class="form-control" ></textarea>
</div> 
</div>  
 
 </div>   
    


  <div class="form-check btn btn-outline-default" style="text-align:left;">
    <label class="form-check-label">
      <input type="checkbox" name="agree" class="form-check-input">
      <small>I agree that the information in the form above is true and accurate and completed to the best of my abilities and knowledge.
          <br>By submitting this form I agree to the <a href="#">terms of use and services</a>. 
          Clicking the button below will act as a <br>signature agreement that the TCI Police may use this form to process my application.</small>
    </label>
  </div>
       
<br><br>
<button type="submit" name="btn_apply" class="btn btn-primary">Apply Now</button>
</form>
</div><!--/span-->
</div><!--/row-->
</div><!--/span-->
    
<?php  include_once 'inc/sidebar.php'; ?>
<?php  include_once 'inc/footer.php'; ?>
<script src="assets/js/countrycodes.js"></script>
<script src="assets/js/application.js"></script>
<script language="javascript">
    window.onload = function(){
	document.getElementById('former-information').style.display = 'none';
        
    }
    jQuery(".formercheckbox").change(function() {
        if(this.checked) {
           jQuery(".former-information").fadeIn();
        }else{
           jQuery(".former-information").fadeOut();
        }
    });
    
    populateCountries("country", "state", "<?= $country; ?>");
</script> 
</body>
</html>