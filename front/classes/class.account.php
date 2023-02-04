<?php
//(FRONT)
class POSTACCOUNT {

   /**
    * @description Post function to pass objects to functions
    * @author nicole
    * @param object, object, object
    * @return functions return
    */ 
    
    public function PostFunction($obj,$validate,$user)
    {
        switch ($obj) {
            case 'btn_save': $result = $this->postAccountForm($validate,$user);
            break;
        
            default:
            break;
        }
         
        return $result;
       
    } 
    
    
    
   /**
    * @description Application use to back end
    * @author nicole
    * @param object, object
    * @return void
    */ 
    
    public function postAccountForm($validate,$user){
        

        //repopulate form
        $staticFirst = $validate->validate_names($user->basicValidation($_POST['staticFirst'])); 
        $staticLast = $validate->validate_names($user->basicValidation($_POST['staticLast'])); 
        
        $staticPassword = $user->basicValidation($_POST['staticPassword']); 
        $staticConfirmPassword = $user->basicValidation($_POST['staticConfirmPassword']); 
        
        $staticCCType = $user->basicValidation($_POST['staticCCType']); 
        $staticCCNumber = $user->basicValidation($_POST['staticCCNumber']); 
        $staticExpiry = $user->basicValidation($_POST['staticExpiryMonth']); 
        $staticCCExpiryYear = $user->basicValidation($_POST['staticCCExpiryYear']); 
        $staticCCCVV = $user->basicValidation($_POST['staticCCCVV']); 
        
       if($staticFirst=="" || $staticLast=="") {
          $user->error = "Your first or last name cannot be blank."; 
       } 
       else if($staticPassword != $staticConfirmPassword) {
          $user->error = "Passwords do not match."; 
       }
       else if($staticCCNumber!="" && ($staticExpiry=="" || $staticCCExpiryYear =="" || $staticCCCVV =="")) {
          $user->error = 'Credit card information is not valid.';
       }
       //check if user is changing password
       else if(strlen($staticPassword) > 0 && strlen($staticPassword) < 7){
         $user->error = "Password is not strong enough."; 
       }
       else
       {

              if(isset($user->error)){
                
                  return false;
                
                }else{

            $success = $user->updateAccount(USER_ID,$staticFirst,$staticLast,$staticPassword,$staticCCType,$staticCCNumber,$staticExpiry,$staticCCExpiryYear,$staticCCCVV);
                    
                    if($success){
                        $user->redirect("myaccount?success");
                        
                    }else{
                        $user->error = 'Problem saving changes. Please try again.';
                        return false;
                    }

            }
            
        }
   }//function


    
 
    
    
    

}
