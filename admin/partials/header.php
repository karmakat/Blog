<?php
$select_all = "SELECT * FROM t_admins WHERE id = :id";
$query_select = $db->prepare($select_all);
$query_select->execute(['id' => $_SESSION['id']]);
$query_result = $query_select->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>fonts/icomoon/style.css">
    <script src="<?= ROOT_URL ?>js/ajax.js"></script>
    <script src="<?= ROOT_URL ?>js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <nav>
        <div class="container nav_container">
            <a href="http://localhost:4044" class="nav_logo">EGATOR</a>
            <ul class="nav_items">
                <li><a href="<?= ROOT_URL ?>views/home.process.php">Home</a></li>
                <li><a href="<?= ROOT_URL ?>views/blog.process.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>views/about.process.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>views/services.process.php">Services</a></li>
                <li><a href="<?= ROOT_URL ?>views/contact.process.php">Contact</a></li>
                <!-- <li><a href="signin.html">Sign in</a></li> -->
                <li class="nav_profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL ?>img/admins_img/<?=$query_result->avatar?>" alt="">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/process/dashboard.process.php">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>admin/views/signout.view.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open_nav-btn"><i class="icon-menu"></i></Menu></button>
            <button id="close_nav-btn"><i class="icon-close"></i></button>
        </div>
    </nav>