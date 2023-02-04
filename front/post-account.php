<?php

/**
 * @description User account submit
 * @author nicole
 * @return class object
 */

include 'classes/class.validation.php';
$validate = new VALIDATE(); 
   
include 'classes/class.account.php';
$postaccount = new POSTACCOUNT(); //front




/**
 * @description If user posts application form submit
 * @author nicole
 * @param form
 */ 

if(isset($_POST))
{
 if(isset($_POST['btn_save'])):
     

    $postaccount->PostFunction('btn_save',$validate,$user);

    
    if(isset($user->error)) {
        //$user->redirect("myaccount");
        //repopulate form
//        $staticFirst = $validate->validate_names($user->basicValidation($_POST['staticFirst'])); 
//        $staticLast = $validate->validate_names($user->basicValidation($_POST['staticLast'])); 
//        
//        $staticCCType = $user->basicValidation($_POST['staticCCType']); 
//        $staticCCNumber = $user->basicValidation($_POST['staticCCNumber']); 
//        $staticExpiry = $user->basicValidation($_POST['staticExpiryMonth']); 
//        $staticCCExpiryYear = $user->basicValidation($_POST['staticCCExpiryYear']); 
//        $staticCCCVV = $user->basicValidation($_POST['staticCCCVV']); 
//        $success = false;
        
    }
  endif;//end button post
  
}//end POST