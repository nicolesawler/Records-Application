<?php

   /**
    * @description Connects user with database
    * @author nicole
    * @return class object
    */

//display errors for testing
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();


$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "root";
$DB_name = "records";

//check session
if(session_status() === PHP_SESSION_ACTIVE){
    try {
        
        $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
        $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $e) { 
        //$user->redirect('log-in');
        echo 'Connection did not work out!';
        return false;
        
    }
}else{
    //$user->redirect('log-in');
    $user->error = 'Session did not start.';
    return false;
}

//object
include_once 'classes/class.user.php';
$user = new USER($DB_con);






//check user login
if(defined('LOGIN_NOT_REQUIRED') && LOGIN_NOT_REQUIRED === 1){
    
    if($user->is_loggedin())
    {
     $user->redirect('home');
    }
    
}else{

    if(!$user->is_loggedin())
    {
     $user->redirect('log-in');
    }

    $userloggedin = $user->getUser();
    
    //$user_id = $_SESSION['user_id'];
    
    define('USER_ID', $_SESSION['user_id']);
    define('FIRST_NAME', $_SESSION['first']);
    define('LAST_NAME', $_SESSION['last']);
    define('USER_EMAIL', $_SESSION['email']);
    define('USER_ROLE', $_SESSION['role']);

}
