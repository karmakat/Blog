<?php
require '../../app/Publics.php';
require '../../app/SignUp.php';
class Category extends SignUp{
    public $dbcon = Publics::getPDO();

    // Add category
    function insert_category($table,$elements){
        $mysql =  "INSERT INTO $table(title,description,created_at,created_by)
        VALUES(?,?,now(),?)";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$elements]);
    }
    
}
?>