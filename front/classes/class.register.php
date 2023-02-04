<?php

class REGISTER {

   /**
    * @description Post function to pass objects to functions
    * @author nicole
    * @param object, object, object
    * @return functions return
    */ 
    
    public function PostFunction($obj,$validate,$user)
    {
        switch ($obj) {
            case 'btn-signup': $result = $this->registerUser($validate,$user);
            break;
        
            default:
            break;
        }
         
        return $result;
       
    } 
    
    
    
   /**
    * @description Register use to back end
    * @author nicole
    * @param object, object
    * @return void
    */ 
    
    public function registerUser($validate,$user){

        $umail = $validate->validate_email($user->basicValidation($_POST['txt_umail'])); 
        $upass = trim($_POST['txt_upass']); 
        $fname = $validate->validate_names($user->basicValidation($_POST['txt_first'])); 
        $lname = $validate->validate_names($user->basicValidation($_POST['txt_last'])); 

       if($fname=="" || $lname=="") {
          $user->error = "Please enter your name."; 
       } 
       else if($umail=="") {
          $user->error = "A valid e-mail is required"; 
       }
       else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
          $user->error = 'Sorry, this isn`t a valid email address';
       }
       else if($upass=="") {
         $user->error = "Password is blank.";
       }
       else if(strlen($upass) < 6){
         $user->error = "C'mon, you can surely make a stronger password than that."; 
       }
       else
       {
             if($user->checkEmail($umail)) {
                $user->error = "Sorry email is already registered.";
             }
             else
             {
              if(isset($user->error)){
                
                  return false;
                
                }else{

                    $lastId = $user->register($fname,$lname,$umail,$upass);
                    
                    if(isset($lastId)){
                        if($user->login($umail,$upass)) 
                        {
                            return $user->redirect('home');
                        }else{
                            $user->error =  "Problem logging in";
                            return false;
                        }
                    }else{
                        $user->error = 'Problem registering';
                        return false;
                    }



            }



             }
        }


    }
 
    
    
    

}
