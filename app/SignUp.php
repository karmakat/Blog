<?php
require 'Publics.php';
class SignUp{
    public $dbcon = Publics::getPDO();

    // Check inputs
    function check_input($field,$required,$message,$array,$operator){
        if(mb_strlen($field) .$operator. $required){
            $array [] = $field.' '.$message;
        }
    }

    function check_password($field1,$field2,$message,$array){
        if($field1 != $field2){
            $array [] = $message;
        }
    }
    function check_mail($value,$message,$array){
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $array[] = $value .' '. $message;
        }
    }

    // Check if the username is already in use
    function is_already_in_use($field, $value, $table)
    {
        $q = $this->dbcon->prepare("SELECT id FROM $table WHERE $field = ?");
        $q->execute([$value]);
        $return = $q->rowCount();
        return $return;
    }
    // Return the error message
    function already_error($array,$value,$message){
        $array [] = $value.' '.$message;
    }
    // Insert the user
    function insert_user($table,$elements){
        $mysql = "INSERT INTO $table(
            firstname,lastname,username,email,password,avatar
            )VALUES(
               ?,?,?,?,?,?
            )";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$elements]);
    }
    // Delete
    function delete($table,$field,$value){
        $mysql = "DELETE FROM $table WHERE $field = ?";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$value]);
    }
}
