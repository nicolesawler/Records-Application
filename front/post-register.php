<?php

   /**
    * @description User register submit
    * @author nicole
    * @return class object
    */

//front 

include 'classes/class.validation.php';
$validate = new VALIDATE(); 
   
include 'classes/class.register.php';
$postregister = new REGISTER();


   /**
    * @description If user posts register form submit
    * @author nicole
    * @param form
    */ 

if(isset($_POST))
{
 if(isset($_POST['btn-signup'])):
     
    include 'back/database.php'; 
 
    $postregister->PostFunction('btn-signup',$validate,$user);

    if(isset($user->error)) {
        $umail = $validate->validate_email($user->basicValidation($_POST['txt_umail'])); 
        $fname = $validate->validate_names($user->basicValidation($_POST['txt_first'])); 
        $lname = $validate->validate_names($user->basicValidation($_POST['txt_last'])); 
    }
  endif;//end button post
  
}//end POST