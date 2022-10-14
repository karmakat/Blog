<?php
session_start();
require '../config/database.php';
require '../config/functions.php';

redirect_the_user('manage-users');
$query = "SELECT * FROM t_admins";
$stmt = $db->prepare($query);
$stmt->execute();

require '../views/manage-users.view.php';
?>