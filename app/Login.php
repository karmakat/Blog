<?php
require 'Publics.php';
class Login{
    // Connect to the database
    public $dbcon = Publics::getPDO();

    // Check if the user or the exist in the database
    function check_id($table,$value){
        $mysql = "SELECT id FROM $table WHERE username = ? OR email = ? ";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$value]);
        $return = $stmt->rowCount();
        return $return;
    }

    // Select the user password
    function select_user_password($table,$value){
        $mysql = "SELECT id FROM $table WHERE username = ? OR email = ? ";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$value]);
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        $return->password;
        return $return;
    }

    // Select the admin password and status
    function select_admin_password($table,$value){
        $mysql = "SELECT id FROM $table WHERE username = ? OR email = ? ";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$value]);
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        $password = $return->password;
        $status = $return->status;
        $object_array = [$password,$status];
        return $object_array;
    }

    
}
?>