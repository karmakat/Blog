<?php
session_start();
require '../config/database.php';
require '../config/functions.php';

if(isset($_GET['title'])){
    $title = $_GET['title'];
    // Check if the isset exist in the database
    $query = "SELECT * FROM t_categories WHERE title = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$title]);
    $data = $stmt->rowCount();
    if($data <= 0){
        header('Location: ../manage-categories.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
        exit();
    }else{
        $delete_query = "DELETE FROM t_categories WHERE title = ?";
        $stmt_query = $db->prepare($delete_query);
        $stmt_query->execute([$title]);

        header('Location: ../manage-categories.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
        exit();

    }
}else{
    header('Location: ../manage-categories.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'].'level='.$_SESSION['level']);
    exit();
}
