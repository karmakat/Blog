<?php
session_start();
require '../config/database.php';
require '../config/functions.php';

if(!empty($_GET['id']) || !empty($_GET['username'] || !empty($_GET['level']))){
   $username  = find_user_by_id($_SESSION['id'],'t_admins');
    if(!$username){
        redirect('index.php');
    }
}
require '../views/dashboard.view.php';
?>