<?php

/**
 * @description Gets application based on id passed
 * @author nicole
 * @return class object
 */

//get application object for DB
include 'back/messages.php';  //back

(int) $msgid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);


if($singlemessage = $messages->getMessage(USER_ID,$msgid)){
    
    // Use these on output of page

    define("MSG_ID",$singlemessage['msg_id']);
    define("MSG_SUBJECT",  $singlemessage['subject']);
    define("MSG",  $singlemessage['message']);
    define("MSG_STATUS",$singlemessage['status']);
    define("MSG_DATE",$user->dateTimeConvert($singlemessage['date_added']));
    
 
    

}else{
    $user->redirect('mymessages');
}

