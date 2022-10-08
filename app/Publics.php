<?php
require 'Constants.php';
class Publics
{
    public static function getPDO()
    {
        try {
            Constants::getConstants();
            $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            die('Database Connection Error : ' . $e->getMessage());
        }
    }
    public static function logout()
    {
        session_start();

        session_destroy();
        $_SESSION = [];
        header('Location:login.view.php');
    }
    public static function select_all($table){
        $mysql = "SELECT * FROM $table";
        $stmt = Publics::getPDO()->prepare($mysql);
        $stmt->execute();
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        return $return;
    }
    public static function select_all_where($table,$field,$value){
        $mysql = "SELECT * FROM $table WHERE $field = ?";
        $stmt = Publics::getPDO()->prepare($mysql);
        $stmt->execute([$value]);
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        return $return;
    }
}
