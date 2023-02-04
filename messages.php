<?php

/* user */
include_once 'back/database.php';
/* css */
$page = 'home';
/* when posted form */
include_once 'front/load-messages.php';
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
    <li class="breadcrumb-item active" aria-current="page">Messages</li>
  </ol>
</nav>


<div class="row row-offcanvas row-offcanvas-right">
    
<div class="col-12 col-md-9">

  <p class="float-right d-md-none">
    <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>


  
<h2>Message Centre</h2> 
    <h5>Public Service Announcements and Notices</h5>
    <hr>  
  <small id="" class="form-text text-muted">
      Last Updated: <strong>July 26, 2017</strong>
  </small>
<br>     


<div class="card text-center">
  <div class="card-header">
    Featured Announcement
  </div>
  <div class="card-body">
    <h4 class="card-title">Special title treatment</h4>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    Posted on date
  </div>
</div>


<br>     
<br>     





<div class="row">
<div class="col-12">
                  

        
    <table class="table">
  <thead class="thead-dark">
    <tr scope="row">
        <th scope="row" colspan="5">
            <strong>Messages (<?=$messageCount;?>)</strong><br>
            <small>
                <em>
                    
                </em>
            </small>
        </th>
    </tr>
  </thead>
</table>
    
<div class="card">
  <div class="card-body">
      
<?= $messagesOutput; ?>
    

  
  </div>
</div>
    
    
                  
</div><!--/span-->
</div><!--/row-->
</div><!--/-->

<?php  include_once 'inc/sidebar.php'; ?>
<?php  include_once 'inc/footer.php'; ?>
<script language="javascript">
</script> 
</body>
</html>
