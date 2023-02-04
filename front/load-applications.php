<?php

/**
 * @description User account submit
 * @author nicole
 * @return class object
 */

//get application object for DB
include 'back/application.php';  //back

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);


$completedOutput = $processingOutput = "";

if($singleapp = $application->getApplication(USER_ID)){
    
    $processingOutput .= "<tr><th scope=row>PR-".$singleapp['applicationid']."</th>"
            . "<td>" . $singleapp['firstname'] . " " . $singleapp['lastname']."</td>"
            . "<td>" . $singleapp['applicationstatus'] . "</td>"
            . "<td>" . $user->dateTimeConvert($singleapp['datecreated']) . "</td>"
            . "<td><a href=viewapplication?id=".$singleapp['applicationid'].">View</a></td></tr>"
            ;

   
}else{
            $processingOutput .= "<tr><td colspan=5><p align=center>You have no applications in processing.</p><td></tr>";
}

if($apps = $application->getApplications(USER_ID)){
    foreach($apps as $app){
        
        $completedOutput .= "<tr><th scope=row>PR-".$app['applicationid']."</th>"
                . "<td>" . $app['firstname'] . " " . $app['lastname']."</td>"
                . "<td>" . $app['applicationstatus'] . "</td>"
                . "<td>" . $user->dateTimeConvert($app['datecreated']) . "</td>"
                . "<td><a href=viewapplication?id=".$app['applicationid'].">View</a></td></tr>"
                ;

    }
}else{
            $completedOutput .= "<tr><td colspan=5><p align=center>You have no completed applications to show.</p><td></tr>" ;
}