<?php

/**
 * @description View Single Application
 * @author nicole
 * @return page
 */

include_once '../back/reports.php';
include_once 'inc/load-users.php';


?>
<?php  include_once 'template/header.php'; ?>
<?php  include_once 'template/sidebar.php'; ?>
 
 <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            
 <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Users</li>
  </ol>
</nav>

<h1>All Users</h1>
<h2></h2> 
<h5>Manage All User & Admin Accounts</h5>
<hr>  

    <table class="table">  
  <thead class="thead-light">
    <tr scope="row">
      <th scope="row" colspan="7">All Admins</th>
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr scope="row">
        <th scope="row">#ID</th>
        <th scope="row">Name</th>
        <th scope="row">Email</th>
        <th scope="row">Creation Date</th>
        <th scope="row">Last Login</th>
        <th scope="row">Role</th>
        <th scope="row">Manage</th>
    </tr>
  </thead>
  <tbody>
      <?= $adminOutput; ?>
  </tbody>
</table>


    <table class="table">  
  <thead class="thead-light">
    <tr scope="row">
      <th scope="row" colspan="7">All Users</th>
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr scope="row">
        <th scope="row">#ID</th>
        <th scope="row">Name</th>
        <th scope="row">Email</th>
        <th scope="row">Creation Date</th>
        <th scope="row">Last Login</th>
        <th scope="row">Role</th>
        <th scope="row">Manage</th>
    </tr>
  </thead>
  <tbody>
      <?= $userOutput; ?>
  </tbody>
</table>
    
<br>

 </main>

<?php  include_once 'template/footer.php'; ?>
   