<?php
//(FRONT)
class POSTAPPLICATION {

   /**
    * @description Post function to pass objects to functions
    * @author nicole
    * @param object, object, object
    * @return functions return
    */ 
    
    public function PostFunction($obj,$validate,$user,$application)
    {
        switch ($obj) {
            case 'btn_apply': $result = $this->postApplicationForm($validate,$user,$application);
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
    
    public function postApplicationForm($validate,$user,$application){
        if(isset($_POST['surname'])){
           $sur = 1;
        }else{
           $sur = 0;
        }
        //form elements validate
        $first = $validate->validate_names($user->basicValidation($_POST['first'])); 
        $last = $validate->validate_names($user->basicValidation($_POST['last'])); 
        $m = $validate->validate_names($user->basicValidation($_POST['middle'])); 
        $ffirst = $validate->validate_names($user->basicValidation($_POST['ffirst'])); 
        $flast = $validate->validate_names($user->basicValidation($_POST['flast'])); 
        $fm = $validate->validate_names($user->basicValidation($_POST['fmiddle'])); 
        $hasformername = $validate->validate_int($user->basicValidation($sur)); 
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
 
       if($first=="" || $last=="") {
          $user->error = "Please enter your first and last name."; 
       } 
       else if($country=="") {
          $user->error = "Please enter the country you were born in."; 
       }
       else if($address=="") {
         $user->error = "Please enter your address.";
       }
       else if($passportnum=="" || $legalnum=="") {
          $user->error = 'Your passport and legal information cannot be left blank.';
       }
       else if(strlen($phone) < 7){
         $user->error = "Sorry, that's not a valid phone number."; 
       }
       else
       {

              if(isset($user->error)){
                
                  return false;
                
                }else{

                    //insert to db
                    $lastId = $application->insertApplication(USER_ID,$first,$last,$m,$ffirst,$flast,$fm,$hasformername,$gender,$birthday,$country,$address,$faddress,$methodoftravel,$arrivaldate,$passportnum,$passportissue,$passportexpiry,$legalnum,$legalissue,$legalexpiry,$occupation,$placeofemployment,$remarks,USER_EMAIL,$phone);
                    
                    if(isset($lastId)){
                        //send to confirmation if added
                        $user->redirect("confirmation?PR=".$lastId);
                        
                    }else{
                        $user->error = 'Problem adding application. Please try again later.';
                        return false;
                    }

            }
            
        }
   }//function


    
 
    
    
    

}
