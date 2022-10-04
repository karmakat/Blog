<?php
session_start();
require '../config/database.php';
require '../config/functions.php';

if(isset($_GET['title'])){
    $title = $_GET['title'];
    // Check if the isset exist in the database
    $query = "SELECT id FROM t_posts WHERE title = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$title]);
    $data = $stmt->rowCount();
    if($data <= 0){
        header('Location: ../views/dashboard.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
        exit();
    }else{
        $delete_query = "DELETE FROM t_posts WHERE title = ?";
        $stmt_query = $db->prepare($delete_query);
        $stmt_query->execute([$title]);

        header('Location: ../views/dashboard.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
        exit();

    }
}else{
    header('Location: ../views/dashboard.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
    exit();
}
