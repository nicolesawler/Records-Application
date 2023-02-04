<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$completedOutput = "";

if($apps = $reports->getOpenApplications()){
    foreach($apps as $app){
        
        $completedOutput .= "<tr><th scope=row>PR-".$app['applicationid']."</th>"
                . "<td>" . strtoupper($app['firstname']) . " " . strtoupper($app['middleinitial']) . " " . strtoupper($app['lastname'])."</td>"
                . "<td>" . $app['applicationstatus'] . "</td>"
                . "<td>Approve | Deny | Cancel</td>"
                . "<td>" . $user->dateTimeConvert($app['datecreated']) . "</td>"
                . "<td><a href=viewapplication?id=".$app['applicationid'].">View</a></td>"
                . "<td>Email | Message | Phone</td>"
                . "<td>?</td>"
                . "</tr>"
                ;

    }
}else{
            $completedOutput .= "<tr><td colspan=5><p align=center>There are no applications to process.</p><td></tr>" ;
}

