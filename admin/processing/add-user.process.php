<?php
session_start();
redirect_the_user('add-user');
try {
    if (isset($_POST['submit'])) {
        $firstname = validate($_POST['txtfirstname']);
        $lastname = validate($_POST['txtlastname']);
        $username = validate($_POST['txtusername']);
        $email = validate($_POST['txtemail']);
        $password = validate($_POST['txtpassword']);
        $confirm = validate($_POST['txtconfirm']);
        $level = $_POST['txtlevel'];
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
            if (is_already_in_use('username', $username, 't_admins')) {
                $errors[] = $username . " is already in use";
            }
            if (is_already_in_use('email', $email, 't_admins')) {
                $errors[] = $email . " is already in use";
            }
            if (empty($avatar)) {
                $errors[] = "Your avatar is required";
            } else {
                $content_dir = "../../img/admins_img/";

                $tmp_file = $_FILES['avatar']['tmp_name'];
                if (!is_uploaded_file($tmp_file)) {
                    $errors[] = "File not found";
                }
                $type_file = $_FILES['avatar']['type'];
                if (!strstr($type_file, 'jpeg') && !strstr($type_file, 'png')) {
                    $errors[] = "This file is not an image";
                }
                $avatar_name = time() . '.jpg';
            }
            if (count($errors) == 0) {
                if (!move_uploaded_file($tmp_file, $content_dir . $avatar_name)) {
                    $errors[] = "Can not copy the file";
                } else {
                    $status = 0;
                    $stmt = $db->prepare("INSERT INTO t_admins(firstname,lastname,username,email,password,level,avatar,status)
			        VALUES(:firstname,:lastname,:username,:email,:password,:level,:avatar,:status)");
                    $stmt->execute([
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'username' => $username,
                        'email' => $email,
                        'password' => $hashed_password,
                        'level' => $level,
                        'avatar' => $avatar_name,
                        'status' => $status
                    ]);
                    set_flash("<strong>" . $username . "</strong>, was been added", "success");
                    clear_input_data();
                }
            } else {
                save_input_data();
            }
        } else {
            $errors[] = "All fields are required";
            save_input_data();
        }
    } else {
        clear_input_data();
    }
} catch (Exception $e) {
    echo 'Registration Error ' . $e->getMessage();
}
