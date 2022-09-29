<?php
session_start();
require 'config/database.php';
require 'config/functions.php';

try {
    if(isset($_POST['login'])){
        
        $auth = validate($_POST['txtauth']);
        $password = validate($_POST['txtpassword']);

        if(!empty($auth) && !empty($password)){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $db->prepare("SELECT id FROM t_users WHERE username = :auth AND password = :password");
            $stmt->execute([
                'auth' => $auth,
                'password' => $password
            ]);

            $userHasBeenFound = $stmt->rowCount();

            if($userHasBeenFound > 0){
                $user_info  = $stmt->fetch(PDO::FETCH_OBJ);
                $_SESSION['id'] = $user_info->id;
                include('config/guest_filter.php');
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
