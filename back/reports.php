<?php

/**
 * @description Reports
 * @author nicole
 * @return class object
 */



include_once 'database.php';



/**
 * @description Gets application DB class
 * @author nicole
 * @return class object
 */

//object
//include_once 'classes/class.application.php';
//$application = new APPLICATION($DB_con);

include_once 'classes/class.reports.php';
$reports = new REPORTS($DB_con);

/**
 * @description Check if user is admin to view reports
 * @author nicole
 * @return void
 */

if(USER_ROLE != 'ADMIN'){
    $user->redirect('../404');
}