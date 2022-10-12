<?php
session_start();
require '../config/functions.php';

redirect_the_user('home');

$query = "SELECT * FROM t_posts ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();

?>