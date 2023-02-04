<?php

/**
 * @description Get All Users and output to table
 * @author nicole
 * @return page
 */

$userOutput = $adminOutput = "";

if($admins = $reports->getAllAdmins()){
    foreach($admins as $a){
        
        $adminOutput .= "<tr><th scope=row>".$a['user_id']."</th>"
                . "<td>".$a['first']." " .$a['last']."</td>"
                . "<td>".$a['email']."</td>"
                . "<td>" . $user->dateTimeConvert($a['date_added']) . "</td>"
                . "<td>" . $user->dateTimeConvert($a['last_login']) . "</td>"
                . "<td>".$a['role']."</td>"
                . "<td><a href='manageuser.php?id='>Manage</a></td>"
                . "</tr>"
                ;

    }
}else{
       $adminOutput .= "<tr><td colspan=5><p align=center>You have no uploaded documents to show.</p><td></tr>" ;
}


if($users = $reports->getAllUsers()){
    foreach($users as $u){
        
        $userOutput .= "<tr><th scope=row>".$u['user_id']."</th>"
                . "<td>".$u['first']." " .$u['last']."</td>"
                . "<td>".$u['email']."</td>"
                . "<td>" . $user->dateTimeConvert($u['date_added']) . "</td>"
                . "<td>" . $user->dateTimeConvert($u['last_login']) . "</td>"
                . "<td>".$u['role']."</td>"
                . "<td><a href='manageuser.php?id=".$u['user_id']."'>Manage</a></td>"
                . "</tr>"
                ;

    }
}else{
       $userOutput .= "<tr><td colspan=5><p align=center>You have no uploaded documents to show.</p><td></tr>" ;
}
