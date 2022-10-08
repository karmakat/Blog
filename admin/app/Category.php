<?php
require '../../app/Publics.php';
require '../../app/SignUp.php';
class Category extends SignUp
{
    public $dbcon = Publics::getPDO();

    // Add category
    function insert_category($table, $elements)
    {
        $mysql =  "INSERT INTO $table(title,description,created_at,created_by)
        VALUES(?,?,now(),?)";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$elements]);
    }

    // Update category
    function update_category($table,$elements)
    {
        $mysql = "UPDATE $table SET title = ?,description = ?, updated_at = now(), updated_by =? WHERE id = ?";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$elements]);
    }
}
