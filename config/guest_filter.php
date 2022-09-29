<?php
if(isset($_SESSION['username'])){
    $directory = 'admin';
    header('Location: '.$directory.'/index.php?id='.$_SESSION['username']);
    exit();
}
?>