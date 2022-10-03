<?php
require 'config/functions.php';

redirect_the_user('home');

$query = "SELECT * FROM t_posts";
$stmt = $db->prepare($query);
$stmt->execute();

?>