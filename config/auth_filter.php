<?php
if(!isset($_SESSION['id']) && !isset($_SESSION['user'])){
    header('Location:index.php');
    exit();
}
?>