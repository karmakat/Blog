<?php
session_start();
require '../config/database.php';
require '../config/functions.php';

if(isset($_GET['username'])){
    $username = $_GET['username'];
    // Check if the isset exist in the database
    $query = "SELECT * FROM t_admins WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$username]);
    $data = $stmt->rowCount();
    if($data <= 0){
        header('Location: ../views/manage-users.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
        exit();
    }else{
        $delete_query = "DELETE FROM t_admins WHERE username = ?";
        $stmt_query = $db->prepare($delete_query);
        $stmt_query->execute([$username]);

        header('Location: ../views/manage-users.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
        exit();

    }
}else{
    header('Location: ../views/manage-users.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
    exit();
}
