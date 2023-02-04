<?php

/* user */
include_once 'back/database.php';
/* css */
$page = 'home';
/* when posted form */
require_once "back/passports.php";

include_once 'front/img-upload.php';
/* header html */
include_once 'inc/header.php'; 

/**
 * @description Shows Users photo uploads
 * @author nicole
 * @return void 
 */ 


?>

  <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">My Passport and Identification</li>
  </ol>
</nav>


<div class="row row-offcanvas row-offcanvas-right">
    
<div class="col-12 col-md-9">

  <p class="float-right d-md-none">
    <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>

  
<h2>My Passport &amp; Identification Documents</h2> 
    <h5>Your passport will be attached to any applications processed online.</h5>
    <hr>  
  <small id="" class="form-text text-muted">You can attach your passport information to your applications automatically by uploading your passport information below.</small>
<br>     

<div class="row">
<div class="col-12">


<form name="upload" method="POST" class="form" enctype="multipart/form-data">
    <h4>Secure Photo Upload</h4>

    <div class="row">

    <div class="col-6">
        
       <div class="form-group">
        <label for="photoType">Photo Type:</label>
         <select name="type" class="form-control">
            <option value="PASSPORT">PASSPORT</option>
            <option value="DRIVERS LICENSE">DRIVERS LICENSE</option>
            <option value="PHOTO ID">PHOTO ID</option>
            <option value="GOVERNMENT ID">GOVERNMENT ID</option>
        </select>
      </div>

    </div>
    <div class="col-6">

      <div class="form-group">
          <label for="photoType" >Attach an image:</label>
        <input class="imageinput" type="file" name="image[]" > 
        <label for="image">Choose Photo</label>
        
        
      </div> 

    </div>
        
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="form-control btn btn-primary " name="btn_upload" >Upload Photo</button>
    </div>
    </div>
   
</form>

    
    <br><hr><br>
<!--    <div id="img"></div>
<div id="img2"></div>-->


 <table class="table">
        
  <thead class="thead-light">
    <tr scope="row">
      <th scope="row" colspan="5">My Photo Documents</th>
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Type</th>
      <th scope="col">View</th>
        <th scope="col">Download</th>
        <th scope="col">Date Added</th>
        <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

<?= $tableImgOutput; ?>
  
  </tbody>
</table>

              
</div><!--/span-->
</div><!--/row-->
</div><!--/-->

<?php  include_once 'inc/sidebar.php'; ?>
<?php  include_once 'inc/footer.php'; ?>
<script src="assets/js/home.js"></script>
<script language="javascript">
//function load_img(element, id, style = "") {
//	document.getElementById(element).innerHTML='<object type="text/html" style="width: 300px; border: 1px solid black;" data="front/img-view.php?id='+ id +'"></object>';
//}
//document.addEventListener( "DOMContentLoaded", function(){
//	// Load the images after the website is loaded. Some examples:
//	load_img("img", 1);
//	load_img("img2", 2);
//});
</script> 
</body>
</html>
