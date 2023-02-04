<?php
require "../back/database.php";
require "../back/passports.php";

(int) $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$img->showImage(USER_ID,$id);

if(!$img->showImage(USER_ID,$id)){
    $user->redirect('../passportid');
}