<div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">

       <p align='center'><img src="assets/imgs/logo.png" class="img-responsive logo" /></p>
    
          <div class="list-group">
            <a href="home" class="list-group-item active">Dashboard</a>
             <a href="messages" class="list-group-item">Message Centre <span class="badge badge-pill badge-danger">1</span></a>
            <a href="myaccount" class="list-group-item">Manage My Account</a>
             <a href="myapplications" class="list-group-item">Manage My Applications</a>
            <a href="application" class="list-group-item">Apply for Police Report</a>
            <a href="passportid" class="list-group-item">My Passport &amp; ID</a>
            <a href="downloadforms" class="list-group-item">Download Forms</a>
            <a href="log-out" class="list-group-item">Log Out</a>
          </div>
       
       <br>
       
       <?php if(USER_ROLE == 'ADMIN'): ?>
    
          <div class="list-group">
            <a href="reports/" class="list-group-item active">Admin</a>
            <a href="reports/" class="list-group-item">Manage Reports</a>
          </div>

       
       <?php endif; ?>
    
       <br>
       
</div><!--/span-->