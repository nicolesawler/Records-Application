<?php

/**
 * @description View Single Application
 * @author nicole
 * @return page
 */

include_once '../back/reports.php';
include_once 'inc/load-viewapp.php';


?>
<?php  include_once 'template/header.php'; ?>
<?php  include_once 'template/sidebar.php'; ?>
 
 <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            
 <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Home</a></li>
    <li class="breadcrumb-item"><a href="openapplications">Open Applications</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Application</li>
  </ol>
</nav>

<h1>View Application</h1>


<div class="row row-offcanvas row-offcanvas-right">
    
<div class="col-12 col-md-9">


  
<h2><?= strtoupper(APP_NAME); ?></h2> 
    <h5>Record Application Number : PR-<?= APP_ID; ?></h5>
    <hr>  
  <small id="" class="form-text text-muted">
      Status: <strong><?= APP_STATUS; ?></strong><br>
      Applied on: <strong><?= APP_DATE; ?></strong>
  </small>
<br>     

<div class="row">
<div class="col-12">
                  

        
<table class="table">  
  <thead class="thead-light">
    <tr scope="row">
      <th scope="row" colspan="5">View Passport</th>
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr scope="row">
        <th scope="row" colspan="5"><?= strtoupper(APP_NAME); ?></th>
    </tr>
  </thead>
</table>
    
<div class="card">
  <div class="card-body">
      
    <p class="card-text">
    <div class="row">
        <div class="col-md-6">
            <strong>Applicant's Name</strong><br>
            <?= strtoupper(APP_NAME); ?>
        </div>
        <div class="col-md-6">
            <strong>Applicant's Former Name</strong><br>
        <?php if(APP_FORMER == 'YES'){
            echo strtoupper(APP_FORMER_NAME);
        }else{
            echo strtoupper(APP_FORMER);
        }?>
        </div>
    </div>     
    </p>
    
    <hr>
    
    <p class="card-text">
    <div class="row">
        <div class="col-md-4">
            <strong>Gender</strong><br>
            <?= strtoupper(APP_GENDER); ?>
        </div>
        <div class="col-md-4">
            <strong>Birth Date</strong><br>
            <?= strtoupper(APP_BIRTHDATE); ?>
        </div>
        <div class="col-md-4">
            <strong>Birth Country</strong><br>
            <?= strtoupper(APP_COUNTRY); ?>
        </div>
    </div>  
    </p>
    
    
    <p class="card-text">
    <div class="row">
        <div class="col-md-4">
            <strong>Method of Transportation</strong><br>
            <?= strtoupper(APP_METHOD_TRANSPORT); ?>
        </div>
        <div class="col-md-4">
            <strong>Arrival Date</strong><br>
            <?= strtoupper(APP_ARRIVAL); ?>
        </div>
    </div>     
    </p>
    
    <hr>
    
    
    <p class="card-text">
        <strong>Address</strong><br>
        <?= strtoupper(APP_ADDRESS); ?>
    </p>
    
    <p class="card-text">
        <strong>Former Address</strong><br>
        <?= strtoupper(APP_FORMER_ADDRESS); ?>
    </p>
    
 <hr>
      <p class="card-text">
    <div class="row">
        <div class="col-md-4">
            <strong>Passport Number</strong><br>
            <?= strtoupper(APP_PASSPORT); ?>
        </div>
        <div class="col-md-4">
            <strong>Passport Issue Date</strong><br>
            <?= strtoupper(APP_PASSPORT_ISSUED); ?>
        </div>
        <div class="col-md-4">
            <strong>Passport Expiry Date</strong><br>
            <?= strtoupper(APP_PASSPORT_EXPIRY); ?>
        </div>
    </div>  
    </p>  
    
    
   <p class="card-text">
    <div class="row">
        <div class="col-md-4">
            <strong>Legal Status Number</strong><br>
            <?= strtoupper(APP_LEGAL_STATUS); ?>
        </div>
        <div class="col-md-4">
            <strong>Legal Status Issue Date</strong><br>
            <?= strtoupper(APP_LEGAL_ISSUED); ?>
        </div>
        <div class="col-md-4">
            <strong>Legal Status Expiry Date</strong><br>
            <?= strtoupper(APP_LEGAL_EXPIRY); ?>
        </div>
    </div>  
    </p>  
    
    <hr>
    
    <p class="card-text">
    <div class="row">
        <div class="col-md-6">
            <strong>Occupation</strong><br>
            <?= strtoupper(APP_OCCUPATION); ?>
        </div>
        <div class="col-md-6">
            <strong>Company Name</strong><br>
            <?= strtoupper(APP_EMPLOYMENT); ?>
        </div>
    </div>  
    </p>  
    
    <p class="card-text">
    <div class="row">
        <div class="col-md-6">
            <strong>Phone</strong><br>
            <?= strtoupper(APP_PHONE); ?>
        </div>
        <div class="col-md-6">
            <strong>Email</strong><br>
            <?= strtoupper(APP_EMAIL); ?>
        </div>
    </div>  
    </p>  
    
<!--    <br><br>
    
    <a href="myapplications" class="btn btn-primary">&laquo; Back to my applications</a>-->
  </div>
</div>
    
    
    <br>
    
    <table class="table">  
  <thead class="thead-light">
    <tr scope="row">
      <th scope="row" colspan="5">User Photo Documents</th>
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr scope="row">
        <th scope="row" colspan="5"></th>
    </tr>
  </thead>
  <tbody>
      <?= $tableImgOutput; ?>
  </tbody>
</table>
    
  <br>
    
    <table class="table">  
  <thead class="thead-light">
    <tr scope="row">
      <th scope="row" colspan="5">Past User Applications</th>
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr scope="row">
        <th scope="row" colspan="5"></th>
    </tr>
  </thead>
    <tbody>
      <?= $tableAppsOutput; ?>
  </tbody>
</table> 
  
    <br>

<?php  include_once 'template/footer.php'; ?>
   