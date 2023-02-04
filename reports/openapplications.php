<?php

   /**
    * @description Admin not logged in
    * @author nicole
    * @return class object
    */
include_once '../back/reports.php';
include_once 'inc/load-applications.php';



?>
<?php  include_once 'template/header.php'; ?>
<?php  include_once 'template/sidebar.php'; ?>
   
 <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            
 <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Open Applications</li>
  </ol>
</nav>

<h1>Open Applications</h1>



<br>
<h3>Applications to be Processed</h3>
<br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                  <th>Applied On</th>
                  <th>Application</th>
                  <th>Cancel</th>
                  <th>Report</th>
                </tr>
              </thead>
              <tbody>
                 <?= $completedOutput; ?>
               
              </tbody>
            </table>
          </div>
        </main>


<?php  include_once 'template/footer.php'; ?>
   