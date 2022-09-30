<?php
if(!empty($_GET['id'])){
   $username  = find_user_by_id($_SESSION['id']);
    if(!$username){
        redirect(ROOT_URL.'signin.php');
    }
}else{
    header('Location: index.php?id='.$_SESSION['id'].'username='.$_SESSION['username']);
    exit();
}

?>