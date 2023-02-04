<?php
$error = false;
/* user */
include_once 'back/database.php';
/* post */
//include 'front/post-home.php';
$page = 'home';
?>

<?php  include_once 'inc/header.php'; ?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Download Forms</li>
  </ol>
</nav>

    
<div class="row row-offcanvas row-offcanvas-right">

<div class="col-12 col-md-9">
  <p class="float-right d-md-none">
    <button type="button" class="btn btn-danger btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>
  <div class="jumbotron">
    <h1><?= FIRST_NAME; ?>, you can download our forms online.</h1>
    <p>The following forms can be printed and returned to one of our offices.</p>
  </div>
  <div class="row">
              
<div class="col-6 col-lg-4">
  <h2>Police Record</h2>
  <p>Royal Turks and Caicos Islands Police Force
      Certificate of Character. <br><small>Serial Number: ncib03ol/2017</small></p>
  <p><a class="btn btn-secondary" target="blank" href="http://www.tcipolice.tc/wp-content/uploads/2017/08/Online-Police-Record-Application.pdf" role="button">View &amp; Download</a></p>
</div><!--/span-->
            
<!--            <div class="col-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-secondary" href="#" role="button">Download</a></p>
            </div>/span
            
            <div class="col-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-secondary" href="#" role="button">Download</a></p>
            </div>/span
            -->


</div><!--/row-->
</div><!--/span-->



<?php  include_once 'inc/sidebar.php'; ?>
<?php  include_once 'inc/footer.php'; ?>
<script src="assets/js/home.js"></script>
<script language="javascript">
</script> 
	
  </body>
</html>