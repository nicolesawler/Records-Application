<?php

/* user */
include_once 'back/database.php';
/* css */
$page = 'home';
/* when posted form */
include_once 'front/load-applications.php';
/* header html */
include_once 'inc/header.php'; 

/**
 * @description Shows Users applications
 * @author nicole
 * @return void 
 */ 


?>

  <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">My applications</li>
  </ol>
</nav>


<div class="row row-offcanvas row-offcanvas-right">
    
<div class="col-12 col-md-9">

  <p class="float-right d-md-none">
    <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>

  
<h2>My Applications</h2> 
    <h5>View all your applications</h5>
    <hr>  
  <small id="" class="form-text text-muted">Only one application may be processed at a time. Completing a new application will cancel any previous processing applications.</small>
<br>     

<div class="row">
<div class="col-12">
                  
    
    <table class="table">
        
  <thead class="thead-light">
    <tr scope="row">
      <th scope="row" colspan="6">Processing Applications</th>
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Application Id</th>
      <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Date Applied</th>
        <th scope="col">View</th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

<?= $processingOutput; ?>
  
  </tbody>
</table>

 <div style="clear:both"></div>
 
<table class="table">
  <thead class="thead-light">
    <tr scope="row">
      <th scope="row" colspan="6">Completed Applications</th>
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr>
        <th scope="col">Application Id</th>
        <th scope="col">Name</th>
          <th scope="col">Status</th>
          <th scope="col">Date Applied</th>
          <th scope="col">View</th>
          <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      
      <?= $completedOutput; ?>
  
  </tbody>
</table>


    
    
                  
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
