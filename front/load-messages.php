<?php

/**
 * @description Load User Messages
 * @author nicole
 * @return class object
 */

//get application object for DB
include 'back/messages.php';  //back

$messagesOutput = "";
$messageCount = 0;
    

if($msgs = $messages->getUserMessages(USER_ID)){
    foreach($msgs as $msg){
        $messageCount++;

        $n = ($msg['user_id'] == 0 ? $n =  "<b>PUBLIC NOTICE:</b> " : $n =  " ");
        
        $messagesOutput .= '<p class=card-text><div class=row><div class=col-md-9>'
                . '<strong>'.$n . $msg['subject'].'</strong><br><small>Posted on '.$user->dateConvert($msg['date_added']).'</small>'
                . '</div><div class=col-md-3><a href="viewmessage?id='.$msg['msg_id'].'" class="btn btn-primary">View Message</a></div></div></p><hr>';

    }
}else{
            $messagesOutput .= "<tr><td colspan=5><p align=center>You have no messages to show.</p><td></tr>" ;
}