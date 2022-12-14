<?php
session_start();
require '../config/database.php';
require '../config/functions.php';
try {
    if (isset($_POST['submit'])) {
        $firstname = validate($_POST['txtfirstname']);
        $lastname = validate($_POST['txtlastname']);
        $username = validate($_POST['txtusername']);
        $email = validate($_POST['txtemail']);
        $password = validate($_POST['txtpassword']);
        $confirm = validate($_POST['txtconfirm']);
        $avatar = $_FILES['avatar'];

        if (
            !empty($firstname) && !empty($username) &&
            !empty($email) && !empty($password) &&
            !empty($confirm)
        ) {
            $errors = [];

            if (mb_strlen($username) < 3) {
                $errors[] = $username . " is too short(min 3)";
            }
            if (mb_strlen($username) > 10) {
                $errors[] = $username . " is too long(max 10)";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = $email . " is invalid";
            }
            if (mb_strlen($password) < 6) {
                $errors[] = "Too short password(min 6)";
            } else {
                if ($password != $confirm) {
                    $errors[] = "Differents passwords";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                }
            }
            if (is_already_in_use('username', $username, 't_users')) {
                $errors[] = $username . " is already in use";
            }
            if (is_already_in_use('email', $email, 't_users')) {
                $errors[] = $email . " is already in use";
            }
            if (empty($avatar)) {
                $errors[] = "Your avatar is required";
            } else {
                $content_dir = "../img/users_img/";

                $tmp_file = $_FILES['avatar']['tmp_name'];
                if (!is_uploaded_file($tmp_file)) {
                    $errors [] = "File not found";
                }
                $type_file = $_FILES['avatar']['type'];
                if (!strstr($type_file, 'jpeg') && !strstr($type_file, 'png')) {
                    $errors[] = "This file is not an image";
                }
                $avatar_name = time() . '.jpg';
            }
            if (count($errors) == 0) {
                if(!move_uploaded_file($tmp_file, $content_dir.$avatar_name)){
                    $errors [] = "Can not copy the file";
                }else{
                    $stmt = $db->prepare("INSERT INTO t_users(firstname,lastname,username,email,password,avatar)
                    VALUES(:firstname,:lastname,:username,:email,:password,:avatar)");
                    $stmt->execute([
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'username' => $username,
                        'email' => $email,
                        'password' => $hashed_password,
                        'avatar' => $avatar_name,
                    ]);
                }
                set_flash("<strong>".$username."</strong>, now you can login", "success");

                redirect('login.view.php');
            } else {
                save_input_data();
            }
        } else {
            $errors[] = "All fields are required";
            save_input_data();
        }
    }else{
        clear_input_data();
    }
} catch (Exception $e) {
    echo 'Registration Error ' . $e->getMessage();
}
