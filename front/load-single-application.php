<?php

/**
 * @description Gets application based on id passed
 * @author nicole
 * @return class object
 */

//get application object for DB
include 'back/application.php';  //back

(int) $appid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);


if($singleapp = $application->getSingleApplication(USER_ID,$appid)){
    
    // Use these on output of page
    
    if($singleapp['hasformername'] == 1){
        define("APP_FORMER",'YES');
    }else{
        define("APP_FORMER",'NOT APPLICABLE');
    }
    
    define("APP_ID",$singleapp['applicationid']);
    define("APP_NAME", $singleapp['firstname'] ." ". $singleapp['middleinitial'] ." ". $singleapp['lastname']);
    define("APP_FORMER_NAME", $singleapp['formerfirstname'] ." ". $singleapp['formermiddleinitial'] ." ". $singleapp['formerlastname']);
    define("APP_STATUS",$singleapp['applicationstatus']);
    define("APP_DATE",$user->dateTimeConvert($singleapp['datecreated']));
    
    define("APP_GENDER",$singleapp['gender']);
    define("APP_BIRTHDATE",$user->dateConvert($singleapp['birthdate']));
    define("APP_COUNTRY",$singleapp['birthcountry']);
    define("APP_ADDRESS",$singleapp['currentaddress']);
    define("APP_FORMER_ADDRESS",$singleapp['formeraddress']);
    define("APP_METHOD_TRANSPORT",$singleapp['methodoftransport']);
    define("APP_ARRIVAL",$user->dateConvert($singleapp['dateofarrival']));
    define("APP_PASSPORT",$singleapp['passportnumber']);
    define("APP_PASSPORT_ISSUED",$user->dateConvert($singleapp['passportissued']));
    define("APP_PASSPORT_EXPIRY",$user->dateConvert($singleapp['passportexpiry']));
    define("APP_LEGAL_STATUS",$singleapp['legalstatusnumber']);
    define("APP_LEGAL_ISSUED",$user->dateConvert($singleapp['legalstatusissued']));
    define("APP_LEGAL_EXPIRY",$user->dateConvert($singleapp['legalstatusexpiry']));
    define("APP_OCCUPATION",$singleapp['occupation']);
    define("APP_EMPLOYMENT",$singleapp['placeofemployment']);
    define("APP_REMARKS",$singleapp['remarks']);
    define("APP_EMAIL",$singleapp['email']);
    define("APP_PHONE",$singleapp['phonenumber']);
    

}else{
    $user->redirect('myapplications');
}

