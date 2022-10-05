<?php
require 'Publics.php';
class Home
{
    public $dbcon = Publics::getPDO();
    function select_all_posts_by_desc($table, $field)
    {
        $mysql = "SELECT * FROM $table ORDER BY $field DESC";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute();
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        return $return;
    }
    function select_post_by_title($table, $value, $redirect_the_user)
    {
        $get_title_value = $_GET[$value];
        if (isset($get_title_value)) {
            $mysql = "SELECT * FROM $table WHERE title=?";
            $stmt = $this->dbcon->prepare($mysql);
            $stmt->execute([$get_title_value]);
            $return = $stmt->fetch(PDO::FETCH_OBJ);
            return $return;
        } else {
            $redirect_the_user;
        }
    }
    function select_random_post($table, $value)
    {
        $value = random_int(0, 4);
        $mysl = "SELECT * FROM $table WHERE id=?";
        $stmt = $this->dbcon->prepare($mysl);
        $stmt->execute([$value]);
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        return $return;
    }
    function look_the_author($table,$username)
    {
        $mysql = "SELECT * FROM $table WHERE username=?";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$username]);
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        return $return;
    }
}
