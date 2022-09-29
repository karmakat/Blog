<?php
if(isset($_SESSION['id'])){
    $directory = 'admin';
    header('Location: '.$directory.'/index.php?id='.$_SESSION['id']);
    exit();
}
?>