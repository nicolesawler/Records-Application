<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$tableImgOutput = "";


if($images = $img->getAllUploads(USER_ID)){
    foreach($images as $image){
        
        $tableImgOutput .= "<tr><th scope=row>".$image['type']."</th>"
                . "<td><a target=_blank href='front/img-view.php?id=".$image['passport_id']."'>View</a></td>"
                . "<td><a href='front/img-download.php?id=".$image['passport_id']."'>Download</a></td>"
                . "<td>" . $user->dateTimeConvert($image['date_added']) . "</td>"
                . "<td><a href='front/img-remove.php?id=".$image['passport_id']."'>Remove</a></td></tr>"
                ;

    }
}else{
       $tableImgOutput .= "<tr><td colspan=5><p align=center>You have no uploaded documents to show.</p><td></tr>" ;
}


if(isset($_POST['btn_upload'])){
    
$type = $user->basicValidation($_POST['type']);
        
if($result = $img->uploadImages($_FILES['image'],USER_ID,$type)){
    $user->redirect('passportid');
}

if(!empty($result->error)){
	foreach($result->error as $errMsg){
		$problems .= $errMsg;
	}
}

if(!empty($result->ids)){
	foreach($result->ids as $id){
		// Do something with $id
	}
}



}