<?php
require "../back/database.php";
require "../back/passports.php";
(int) $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$img->downloadImage(USER_ID,$id);

//if user tries to download images that aren't theirs then output:
echo "Sorry, you can only download images that are yours.";
