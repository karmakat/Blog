<?php
session_start();
require 'config/database.php';
require 'config/_flash.php';
require 'config/functions.php';

if (isset($_GET['id']) == $_SESSION['id']) {
    $errors = [];
    $errors[] = "This is your first login you must change your password. \n";
    try {
        if (isset($_POST['update'])) {
            $old = validate($_POST['txtoldpassword']);
            $new = validate($_POST['txtnew']);
            $confirm = validate($_POST['txtconfirm']);

            if (!empty($old) && !empty($new) && !empty($confirm)) {
                $select_all = "SELECT * FROM t_admins WHERE id = ?";
                $query_select = $db->prepare($select_all);
                $query_select->execute([$_SESSION['id']]);
                $query_result = $query_select->fetch(PDO::FETCH_OBJ);
                $user_password = $query_result->password;

                if (password_verify($old, $user_password)) {
                    if (mb_strlen($new) < 6) {
                        $errors[] = "Too short password(min 6)";
                    } else {
                        if ($new !== $confirm) {
                            $errors[] = "Differents passwords";
                        }
                    }
                    if ($new == $old) {
                        $errors[] = "The new password must be different";
                    } else {
                        $active_status = $query_result->status;
                        $hashed_password = password_hash($new, PASSWORD_BCRYPT);
                        if($active_status == 1){
                            $update_password = "UPDATE t_admins SET password = ? WHERE id = ?";
                            $stmt = $db->prepare($update_password);
                            $stmt->execute([$hashed_password,$_SESSION['id']]);
                            redirect('index.php');
                        }else{
                            $active_status = 1;
                            $update_password = "UPDATE t_admins SET password = ?, status = ? WHERE id = ?";
                            $stmt = $db->prepare($update_password);
                            $stmt->execute([$hashed_password,$active_status, $_SESSION['id']]);
                            redirect('index.php');
                        }
                    }
                } else {
                    $errors[] = "Please enter your old password";
                }
            } else {
                $errors[] = "All fields are required";
            }
        } else {
            clear_input_data();
        }
    } catch (Exception $e) {
        echo "Update Error :" . $e->getMessage();
    }
} else {
    $page = 'update-password';
    header('Location: ' . $page . '.php?id=' . $_SESSION['id']);
}
