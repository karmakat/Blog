<?php
if(!empty($_GET['id']) || !empty($_GET['username'])){
   $username  = find_user_by_id($_SESSION['id']);
    if(!$username){
        redirect(ROOT_URL.'signin.php');
    }
}else{
    header('Location: dashboard.php?id='.$_SESSION['id'].'username='.$_SESSION['username']);
    exit();
}

?>