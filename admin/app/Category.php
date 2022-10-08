<?php
require '../../app/Publics.php';
require '../../app/SignUp.php';
class Category extends SignUp{
    public $dbcon = Publics::getPDO();

    // Add category
    function insert_user($table,$elements){
        $mysql =  "INSERT INTO t_categories(title,description,created_at,created_by)
        VALUES(?,?,now(),?)";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$elements]);
    }
    
}
?>