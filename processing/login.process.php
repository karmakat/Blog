<?php
session_start();
require 'config/database.php';
require 'config/functions.php';

try {
    if(isset($_POST['login'])){
        
        $auth = validate($_POST['txtauth']);
        $password = validate($_POST['txtpassword']);

        if(!empty($auth) && !empty($password)){
            $stmt = $db->prepare("SELECT id FROM t_users WHERE username = :auth OR email = :auth");
            $stmt->execute(['auth' => $auth]);
            $userHasBeenFound = $stmt->rowCount();

            if($userHasBeenFound > 0){
                $select_all = "SELECT * FROM t_users WHERE username = :auth OR email= :auth";
                $query_select = $db->prepare($select_all);
                $query_select->execute(['auth' => $auth]);
                $query_result = $query_select->fetch(PDO::FETCH_OBJ);
                $user_password = $query_result->password;

                // Verify the password
                if(password_verify($password,$user_password)){
                    $_SESSION['id'] = $query_result->id;
                    $_SESSION['username'] = $query_result->username;
                    $_SESSION['is_admin'] = $query_result->is_admin;
                    include('config/guest_filter.php');
                }
            }else{
                set_flash('Invalid username, mail or password', 'error');
                save_input_data();
            }
        }else{
            set_flash("All fields are required", "error");
            save_input_data();
        }
    }else{
        clear_input_data();
    }
} catch (Exception $e) {
    echo 'Authentification error :'.$e->getMessage();
}
