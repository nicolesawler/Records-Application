<?php

   /**
    * @description If user is logged in, redirects home, otherwise redirects to login
    * @author nicole
    * @return void
    */

include_once 'back/database.php';

define('LOGIN_NOT_REQUIRED', 1);


if(defined('LOGIN_NOT_REQUIRED') && LOGIN_NOT_REQUIRED === 1){
    
    if($user->is_loggedin())
    {
     $user->redirect('home');
    }else{
        $user->redirect('log-in');
    }
    
}else{

    if(!$user->is_loggedin())
    {
     $user->redirect('log-in');
    }
    else
    {
      $user->redirect('home');
    }


}