<?php


/**
 * @description Post Message
 * @author nicole
 * @return result
 */

$error = $success = $msgsuccess = false;


/**
 * @description Check if email was passed via another page
 * @author nicole
 * @return result
 */

if(isset($_GET['e'])){
    
    (int) $e = filter_input(INPUT_GET, 'e', FILTER_SANITIZE_STRING);
      $email = filter_var($e, FILTER_VALIDATE_EMAIL);

}

/**
 * @description User submit post
 * @author nicole
 * @return result
 */

if(isset($_POST['btn_send_message'])){
   
    $subject = $user->basicValidation($_POST['msg_subject']);
    $message = $user->basicValidation($_POST['msg_message']);

    if($_POST['msg_email'] != ""){
        $email = filter_var($_POST['msg_email'], FILTER_VALIDATE_EMAIL);
       
        if(!$user_id_msg = $messages->getUserByEmail($email)){
            
            $user->error = "That user does not exist.";
            unset($user_id_msg);
        }
        
    }else{
        $email = "";
        $user_id_msg = 0;
    }
    
    if(isset($user_id_msg)){
        

        if($subject == "" || $message == ""){
            $user->error = "Subject and message are required.";
        }
        else if(strlen($subject) < 3 || strlen($message) < 15 ){
            $user->error = "That message doesn't seem long enough.";
        }
        else{
            if($messages->addUserMessage($user_id_msg,$subject,$message)){
                $msgsuccess = true;
            }else{
                $user->error = "Problem sending message.";
            }
        }
        
    }
    
    
}//function
    