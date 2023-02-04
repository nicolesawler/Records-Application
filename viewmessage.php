<?php

/* user */
include_once 'back/database.php';
/* css */
$page = 'home';
/* when posted form */
include_once 'front/load-single-message.php';
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
    <li class="breadcrumb-item"><a href="mymessages">My Messages</a></li>
    <li class="breadcrumb-item active" aria-current="page">Message</li>
  </ol>
</nav>


<div class="row row-offcanvas row-offcanvas-right">
    
<div class="col-12 col-md-9">

  <p class="float-right d-md-none">
    <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>


  
<h2>My Message Centre</h2> 
    <h5>Message Number : <?= MSG_ID; ?></h5>
    <hr>  
  <small id="" class="form-text text-muted">
      Status: <strong><?= MSG_STATUS; ?></strong><br>
      Applied on: <strong><?= MSG_DATE; ?></strong>
  </small>
<br>     

<div class="row">
<div class="col-12">
                  


        
    <table class="table">
  <thead class="thead-dark">
    <tr scope="row">
        <th scope="row" colspan="5">
            <strong><?= MSG_SUBJECT; ?></strong><br>
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
      
<?= MSG; ?>
  
  </div>
</div>
    
    

    

    
    <br><br>
    
    <a href="messages" class="btn btn-primary">&laquo; Back to my messages</a>

    
    
    
                  
</div><!--/span-->
</div><!--/row-->
</div><!--/-->

<?php  include_once 'inc/sidebar.php'; ?>
<?php  include_once 'inc/footer.php'; ?>
<script language="javascript">
</script> 
</body>
</html>
