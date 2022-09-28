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
        $confirm = filter_var($_POST['txtconfirm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $avatar = $_FILES['avatar'];

        if (!$firstname) {
            $_SESSION['signup'] = "Please enter your First Name";
        } elseif (!$lastname) {
            $_SESSION['signup'] = "Please enter your Last Name";
        } elseif (!$username) {
            $_SESSION['signup'] = "Please enter your username";
        } elseif (!$email) {
            $_SESSION['signup'] = "Please enter your email";
        } else if (mb_strlen($password) < 4) {
			$errors[] = "Too short password(min 4)";
		} else if (!$avatar['name']) {
            $_SESSION['signup'] = "Please add avatar";
        } else {
            if ($password !== $confirm) {
                $_SESSION['signup'] = "Passwords do not match";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $user_check_query= "SELECT * FROM t_users WHERE username = '$username' OR email = '$email'";
                $user_check_result = mysqli_query($connection, $user_check_query);
                
                if (mysqli_num_rows($user_check_result) > 0) {
                    $_SESSION['signup'] = 'Username or Email is already exist';
                } else {
                    $time = time();
                    $avatar_name = $time . $avatar['name'];
                    $avatar_tmp_name = $avatar['name'];
                    $avatar_destination_path = 'img/' . $avatar_name;

                    $allowed_files = ['png', 'jpg', 'jpeg'];
                    $extension = explode('.', $avatar_name);
                    $extension = end($extension);
                    if (in_array($extension, $allowed_files)) {
                        if ($avatar['size'] < 1000000) {
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
        // Redirect back if there was any problem
        if ($_SESSION['signup'] ?? null) {
            $_SESSION['signup-data'] = $_POST;
            header('Location:' . ROOT_URL . 'signup.php');
            die();
        } else {
            $insert_user_query = "INSERT INTO t_users SET firstname='$firstname',
            lastname='$lastname', username='$username', password='$hashed_password'
            avatar='$avatar_name', is_admin='0'";
            $insert_user_result = mysqli_query($connection,$insert_user_query); 
            
            if (!mysqli_errno($connection)) {
                $_SESSION['signup-success'] = "Registration successfull";
                header('Location'  . ROOT_URL . 'signin.php');
                die();
            }
        }
    } 
} catch (Exception $e) {
    echo 'Registration Error ' . $e->getMessage();
}
