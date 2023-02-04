<?php

   /**
    * @description User application submit
    * @author nicole
    * @return class object
    */

include 'classes/class.validation.php';
$validate = new VALIDATE(); 
   
include 'classes/class.application.php';
$postapp = new POSTAPPLICATION(); //front


   /**
    * @description If user posts application form submit
    * @author nicole
    * @param form
    */ 

if(isset($_POST))
{
 if(isset($_POST['btn_apply'])):
     
     //get application object for DB
    include 'back/application.php';  //back
 
    $postapp->PostFunction('btn_apply',$validate,$user,$application);

    
    if(isset($user->error)) {
        
        //repopulate form
        $first = $validate->validate_names($user->basicValidation($_POST['first'])); 
        $last = $validate->validate_names($user->basicValidation($_POST['last'])); 
        $m = $validate->validate_names($user->basicValidation($_POST['middle'])); 
        $ffirst = $validate->validate_names($user->basicValidation($_POST['ffirst'])); 
        $flast = $validate->validate_names($user->basicValidation($_POST['flast'])); 
        $fm = $validate->validate_names($user->basicValidation($_POST['fmiddle'])); 
        $gender = $validate->validate_string($user->basicValidation($_POST['gender'])); 
        $birthday = $validate->validate_date($user->basicValidation($_POST['birthday'])); 
        $country = $user->basicValidation($_POST['country']); 
        $address = $user->basicValidation($_POST['address']); 
        $faddress = $user->basicValidation($_POST['faddress']); 
        $methodoftravel = $validate->validate_string($user->basicValidation($_POST['methodoftravel'])); 
        $arrivaldate = $validate->validate_date($user->basicValidation($_POST['arrival'])); 
        $passportnum = $validate->validate_string($user->basicValidation($_POST['passport'])); 
        $passportissue = $validate->validate_date($user->basicValidation($_POST['passportissued'])); 
        $passportexpiry = $validate->validate_date($user->basicValidation($_POST['passportexpiry'])); 
        $legalnum = $validate->validate_string($user->basicValidation($_POST['legalnum'])); 
        $legalissue = $validate->validate_date($user->basicValidation($_POST['legalissue'])); 
        $legalexpiry = $validate->validate_date($user->basicValidation($_POST['legalexpiry'])); 
        $occupation = $user->basicValidation($_POST['occupation']); 
        $placeofemployment = $user->basicValidation($_POST['employment']); 
        $remarks = $user->basicValidation($_POST['remarks']); 
        $phone = $validate->validate_string($user->basicValidation($_POST['phone']));  
        
        
    }
  endif;//end button post
  
}//end POST