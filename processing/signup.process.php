<?php
session_start();
require '../config/database.php';
try {
    if (isset($_POST['submit'])) {
        $firstname = filter_var($_POST['txtfirstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['txtlastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['txtusername'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['txtemail'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($_POST['txtpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirim = filter_var($_POST['txtconfirm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $avatar = $_FILES['avatar'];

        if (!$firstname) {
            $_SESSION['signup'] = "Please enter your First Name";
        } elseif (!$lastname) {
            $_SESSION['signup'] = "Please enter your Last Name";
        } elseif (!$username) {
            $_SESSION['signup'] = "Please enter your username";
        } elseif (!$email) {
            $_SESSION['signup'] = "Please enter your email";
        } else if (mb_strlen($password) < 6) {
			$errors[] = "Too short password(min 6)";
		} else if (!$avatar['name']) {
            $_SESSION['signup'] = "Please add avatar";
        } else {
            if ($password != $confirm) {
                $_SESSION['signup'] = "Passwords do not match";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $q_username_check = "SELECT * FROM t_users WHERE username = ? OR email = ?";
                $query = $db->prepare($q_username_check);
                $query->execute([
                    'username' => $username,
                    'email' => $email
                ]);
                $result = $query->rowCount();
                if ($result > 0) {
                    $_SESSION['signup'] = 'Username or Email is already exist';
                } else {
                    $time = time();
                    $avatar_name = $time . $avatar_name['name'];
                    $avatar_tmp_name = $avatar['name'];
                    $avatar_destination_path = 'img/' . $avatar_name;

                    $allowed_files = ['png', 'jpg', 'jpeg'];
                    $extension = explode('.', $avatar_name);
                    $extension = end($extension);
                    if (in_array($extension, $allowed_files)) {
                        if ($avatar['size'] < 100000) {
                            move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                        } else {
                            $_SESSION['signup'] = "File size too big. Should be less than 1mb";
                        }
                    } else {
                        $_SESSION['signup'] = "File should be png, jpg or jpeg";
                    }
                }
            }
        }
        if ($_SESSION['signup']) {
            $_SESSION['signup-data'] = $_POST;
            header('location:' . ROOT_URL . 'signup.php');
            die();
        } else {
            $is_admin = "yes";
            $query = $db->prepare("INSERT INTO t_users (:firstname,lastname,username,email,password,avatar,is_admin)VALUES(:firstname, :lastname, :username,:email,:password,:avatar,:is_admin)");
            $query->execute([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'username' => $username,
                'email' => $email,
                'password' => $hashed_password,
                'avatar' => $avatar_name,
                'is_admin' => $is_admin
            ]);

            // $q = $db->prepare("INSERT INTO t_users(user,mail,password)
            // VALUES(:user, :mail, :password)");
            // $q->execute([
            // 	'user' => $username,
            // 	'mail' => $mail,
            // 	'password' => sha1($password)
            // ]);
            if ($query) {
                $_SESSION['signup'] = "Registration successfull";
                header('location'  . ROOT_URL . 'signin.php');
                die();
            }
        }
    } else {
    }
} catch (Exception $e) {
    echo 'Registration Error ' . $e->getMessage();
}
