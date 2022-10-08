<?php
require '../../app/Publics.php';
require '../../app/SignUp.php';
class User extends SignUp
{
    public $dbcon = Publics::getPDO();

    function add_user($table,$elements)
    {
        $mysql =  "INSERT INTO t_admins(firstname,lastname,username,email,password,level,avatar,status)
        VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $this->dbcon->prepare($mysql);
        $stmt->execute([$elements]);
    }
}
