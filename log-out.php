<?php

   /**
    * @description logs user out and redirects to index
    * @author nicole
    * @return void
    */

include_once 'back/database.php';
$user->logout();
$user->redirect('index');