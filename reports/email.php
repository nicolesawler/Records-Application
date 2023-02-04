<?php

   /**
    * @description Email User(s)
    * @author nicole
    * @return class object
    */
include_once '../back/reports.php';

?>
<?php  include_once 'template/header.php'; ?>
<?php  include_once 'template/sidebar.php'; ?>
   


        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Send Email (No Functionality)</h1>

        
   <form action="inc/send-email.php" method="POST" enctype="text/plain" id="contactForm" class='form-control'>
    <div class="col-sm-12">
        <!-- if mail sent successfully  -->
        <h4 class="success">
            <i class="fa fa-check"></i> Your message has been sent successfully.
        </h4>
        <!-- if mail sent unsuccessfully  -->
        <h4 class="error">
            <i class="fa fa-warning"></i> E-mail must be valid and message must be longer than 1 character.
        </h4>
    </div>
    <div class="col-sm-6">
        <input  value='nicole' id="name" type="text" name="name" placeholder="Your Name"  class='form-control'>
    </div><!-- col-sm-6 end -->
    <div class="col-sm-6">
        <input  value='nicolesawler@gmail.com' id="email" type="email" name="email" placeholder="Your Email" class='form-control'>
    </div><!-- col-sm-6 end -->
    <div class="col-md-12">
        <textarea type="text" name="message" id="message" rows="5" placeholder="Message" class='form-control'></textarea>
        <button class="btn-new btn-bold" type="submit" id="submit" name="submit">Submit Message</button>
    </div>
</form>
          
          
          
          
        </main>


<?php  include_once 'template/footer.php'; ?>
   