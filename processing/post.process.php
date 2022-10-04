<?php
require '../config/functions.php';
try {
    if (isset($_GET['title'])) {
        $title = $_GET['title'];
        $query = "SELECT * FROM t_posts WHERE title=?";
        $stmt = $db->prepare($query);
        $stmt->execute([$title]);
        $data_posts = $stmt->fetch(PDO::FETCH_OBJ);
    }else{
        redirect_the_user('home');
    }
} catch (Exception $e) {
    echo "Initial Error : ".$e;
}

