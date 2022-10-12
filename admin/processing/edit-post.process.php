<?php
session_start();
try {
    if (isset($_GET['title'])) {
        // Check if the title exist
        $q = $db->prepare("SELECT * FROM t_posts WHERE title=?");
        $q->execute([$_GET['title']]);
        $result = $q->fetch(PDO::FETCH_OBJ);

        if ($result) {
            // Select all categories
            $query = "SELECT * FROM t_categories";
            $stmt = $db->prepare($query);
            $stmt->execute();

            // Check now inputs
            if (isset($_POST['submit'])) {
                $title = validate($_POST['txttitle']);
                $body = validate($_POST['txtbody']);
                $category = validate($_POST['txtcategory']);
                $thumbmail = $_FILES['thumbmail'];
                $updated_by = $_SESSION['username'];
                $id = $result->id;

                $errors = [];

                if (!empty($title) && !empty($body) && !empty($category)) {
                    if (mb_strlen($title) > 100) {
                        $errors[] = "Too long title(max 100)";
                    }
                    if (mb_strlen($body) > 10000) {
                        $errors[] = "Too long body content(max 10 000)";
                    }
                    if (is_already_in_use('title', $title, 't_posts')) {
                        $errors[] = $title . " is already exist";
                    }
                    if (empty($thumbmail)) {
                        $errors[] = "Your thumbmail is required";
                    } else {
                        $content_dir = "../../img/posts_img/";

                        $tmp_file = $_FILES['thumbmail']['tmp_name'];
                        if (!is_uploaded_file($tmp_file)) {
                            $errors[] = "File not found";
                        }
                        $type_file = $_FILES['thumbmail']['type'];
                        if (!strstr($type_file, 'jpeg') && !strstr($type_file, 'png')) {
                            $errors[] = "This file is not an image";
                        }
                        $thumbmail_name = time() . '.jpg';
                        if (count($errors) == 0) {
                            if (!move_uploaded_file($tmp_file, $content_dir . $thumbmail_name)) {
                                $errors[] = "Can not copy the file";
                            } else {
                                $update_query = "UPDATE t_posts SET  title = ?,body = ?,category = ?,
                                updated_at = now(),updated_by = ?,thumbmail = ? WHERE id = ?";
                                $stmt = $db->prepare($update_query);
                                $stmt->execute([$title, $body, $category, $updated_by, $thumbmail_name, $id]);
                            }
                            set_flash($updated_by . " your post was been updated", "success");
                        }
                    }
                } else {
                    $errors[] = "All fields are required";
                    save_input_data();
                }
            } else {
                clear_input_data();
            }
        } else {
            header('Location: ../views/dashboard.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
            exit();
        }
    } else {
        header('Location: ../dashboard.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
        exit();
    }
} catch (Exception $e) {
    echo "Initial Error : " . $e->getMessage();
}
require '../views/edit-post.view.php';
