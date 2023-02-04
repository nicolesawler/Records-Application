<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$error = $success = false;
(int) $viewid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
if(isset($_GET['success'])){
    (int) $s = filter_input(INPUT_GET, 'success', FILTER_SANITIZE_STRING);
    if($s==1){
        $success = true;
    }
}


$tableImgOutput = $tableAppsOutput = "";

if(!isset($viewid)){
    $user->redirect('allusers');
}

if($u = $reports->manageUser($viewid)){

    define("U_ID",$u['user_id']);
    define("U_FIRST", $u['first']);
    define("U_LAST", $u['last']);
    define("U_EMAIL", $u['email']);
    define("U_ROLE",$u['role']);
    define("U_DATE",$user->dateTimeConvert($u['date_added']));
    define("U_LASTLOGIN",$user->dateTimeConvert($u['last_login']));
    

}else{
    $user->redirect('allusers');
}



/**
 * @description Save Changes on Manage User
 * @author nicole
 * @return result
 */


include '../front/classes/class.validation.php';
$validate = new VALIDATE();

if(isset($_POST['btn_save'])){
   
    //$form_email = $user->basicValidation($_POST['form_email']);
    $form_pass = $_POST['gen_pass'];
    $form_first = $user->basicValidation($validate->validate_names($_POST['form_first']));
    $form_last = $user->basicValidation($validate->validate_names($_POST['form_last']));
    $form_role = $user->basicValidation($_POST['form_role']);
    
    
    if (strlen($form_role) < 1 || strlen($form_role) > 7) {
        $user->error = "That role does not exist.";
    }

    $roleoptions = array("USER", "ADMIN");
    if (!in_array($form_role, $roleoptions)) {
        $user->error = "That role does not exist.";
    }
    if($form_first == "" || $form_last == ""){
        $user->error = "First and last name are required.";
    }

            if($reports->updateManageUserAccount(U_ID, $form_pass, $form_first, $form_last, $form_role)){
                $user->redirect('manageuser?id='.U_ID.'&success=1');
            }else{
                $user->error = "Problem updating user.";
            }


    
    
}//function
    