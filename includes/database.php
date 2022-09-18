<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=db_blog;', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    return $db;
} catch (PDOException $e) {
    echo "Erreur de connexion".$e->getMessage();
}
?>