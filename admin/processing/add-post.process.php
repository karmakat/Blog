<?php
redirect_the_user('add-post');

// Select all categories
$query = "SELECT * FROM t_categories";
$stmt = $db->prepare($query);
$stmt->execute();

if (isset($_POST['add'])) {
    $title = validate($_POST['txttitle']);
    $body = validate($_POST['txtbody']);
    $category = validate($_POST['txtcategory']);
    $thumbmail = $_FILES['thumbmail'];
    $created_by = $_SESSION['username'];

    $errors = [];

    if (!empty($title) && !empty($body) && !empty($category) && !empty($thumbmail)) {
        if (mb_strlen($title) > 100) {
            $errors[] = "Too long title(max 100)";
        }
        if (mb_strlen($body) > 10000) {
            $errors[] = "Too long body content(max 10 000)";
        }
        if (is_already_in_use('title', $title, 't_posts')) {
            $errors[] = $title . "is already exist";
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
                    $insert_query = "INSERT INTO t_posts(title,body,category,created_at,created_by,thumbmail)
                    VALUES (?,?,?,now(),?,?)";
                    $stmt = $db->prepare($insert_query);
                    $stmt->execute([$title, $body, $category, $created_by, $thumbmail_name]);

                    set_flash($created_by . " your post was been addeed", "success");
                    header('Location: dashboard.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
                    exit();
                }
            }
        }
    } else {
        $errors[] = "All fields are required";
        save_input_data();
    }
} else {
    $errors[] = "Not found";
    clear_input_data();
}
