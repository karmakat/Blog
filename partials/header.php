<?php
require 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="../js/main.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <nav>
        <div class="container nav_container">
            <a href="http://localhost:4044" class="nav_logo">EGATOR</a>
            <ul class="nav_items">
                <li><a href="<?= ROOT_URL?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL?>services.php">Services</a></li>
                <li><a href="<?= ROOT_URL?>contact.php">Contact</a></li>
                <li><a href="<?= ROOT_URL?>signin.php">Sign in</a></li>
            </ul>
            <button id="open_nav-btn"><i class="icon-menu"></i></Menu></button>
            <button id="close_nav-btn"><i class="icon-close"></i></button>
        </div>
    </nav>