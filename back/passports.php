<?php

define("DB_HOST", $DB_host);
define("DB_USER", $DB_user);
define("DB_PASS", $DB_pass);
define("DB_NAME", $DB_name);
define("DB_TABLE", "passport_images");

// /Applications/MAMP/htdocs/record_application
// /var/www/sites/labs.momentous.com/www/TCIpolice
define("R_PATH", '/Applications/MAMP/htdocs/record_application');
define("F_PATH", R_PATH.'/profiles');
define("H_FILE", false);

define("F_SIZE", "4M");


require_once "classes/class.imgupload.php";
$img = new ImageUpload;
