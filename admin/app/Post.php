<?php
require '../../app/Publics.php';

class Post extends SignUp
{
    public $dbcon = Publics::getPDO();

    function add_post($table,$elements)
    {
        $mysql = "INSERT INTO $table(title,body,category,created_at,created_by,thumbmail)
        VALUES (?,?,?,now(),?,?)";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$elements]);
    }
}
