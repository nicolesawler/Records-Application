<?php

/* 
 * Removes image by changing status to DELETE, won't be visible to user
 */


require "../back/database.php";
require "../back/passports.php";

(int) $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$img->removeImage(USER_ID,$id);
$user->redirect("../passportid");
