<?php
if(!empty($_GET['id']) || !empty($_GET['username'] || !empty($_GET['level']))){
   $username  = find_user_by_id($_SESSION['id'],'t_admins');
    if(!$username){
        redirect('index.php');
    }
}else{
    header('Location: views/dashboard.view.php?id='.$_SESSION['id'].'username='.$_SESSION['username']);
    exit();
}

?>