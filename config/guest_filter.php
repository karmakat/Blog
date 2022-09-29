<?php
if(isset($_SESSION['id']) || isset($_SESSION['username'])){
    $directory = 'admin';
    header('Location: '.$directory.'/index.php?id='.$_SESSION['id'].'username='.$_SESSION['username']);
    exit();
}
?>