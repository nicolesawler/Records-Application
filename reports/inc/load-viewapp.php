<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(int) $appid = filter_input(INPUT_GET, 'id', FILTER_UNSAFE_RAW);
$tableImgOutput = $tableAppsOutput = "";

if(!isset($appid)){
    $user->redirect('openapplications');
}



if($singleapp = $reports->getSingleApplication($appid)){
    
    // Use these on output of page
    
    if($singleapp['hasformername'] == 1){
        define("APP_FORMER",'YES');
    }else{
        define("APP_FORMER",'NOT APPLICABLE');
    }
    
    define("APP_ID",$singleapp['applicationid']);
    define("APP_USER_ID",$singleapp['user_id']);
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
    $user->redirect('openapplications');
}

if($documents = $reports->getPhotoDocuments(APP_USER_ID)){
    foreach($documents as $image){
        
        $tableImgOutput .= "<tr><th scope=row>".$image['type']."</th>"
                . "<td><a target=_blank href='../front/img-view.php?id=".$image['passport_id']."'>View</a></td>"
                . "<td><a href='../front/img-download.php?id=".$image['passport_id']."'>Download</a></td>"
                . "<td>" . $user->dateTimeConvert($image['date_added']) . "</td>"
                . "<td><a href='../front/img-remove.php?id=".$image['passport_id']."'>Remove</a></td></tr>"
                ;

    }
}else{
       $tableImgOutput .= "<tr><td colspan=5><p align=center>You have no uploaded documents to show.</p><td></tr>" ;
}



if($allapps = $reports->getAllSingleUserApplications(APP_USER_ID)){
    foreach($allapps as $app){
        
        $tableAppsOutput .= "<tr><th scope=row>PR-".$app['applicationid']."</th>"
                . "<td>" . $app['firstname'] . " " . $app['lastname']."</td>"
                . "<td>" . $app['applicationstatus'] . "</td>"
                . "<td>" . $user->dateTimeConvert($app['datecreated']) . "</td>"
                . "<td><a href=viewapplication?id=".$app['applicationid'].">View</a></td></tr>"
                ;

    }
}else{
       $tableAppsOutput .= "<tr><td colspan=5><p align=center>You have no completed applications to show.</p><td></tr>" ;
}
