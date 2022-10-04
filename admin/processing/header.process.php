<?php
session_start();
require '../config/database.php';
require '../config/functions.php';

$select_all = "SELECT * FROM t_admins WHERE id = :id";
$query_select = $db->prepare($select_all);
$query_select->execute(['id' => $_SESSION['id']]);
$query_result = $query_select->fetch(PDO::FETCH_OBJ);
?>