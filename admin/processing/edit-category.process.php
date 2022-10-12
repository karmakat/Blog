<?php
session_start();
if (isset($_GET['title'])) {
    $title = $_GET['title'];
    // Check if the isset exist in the database
    $query = "SELECT * FROM t_categories WHERE title = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$title]);
    $data = $stmt->rowCount();
    if ($data == 0) {
        header('Location: manage-categories.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
        exit();
    } else {
        if (isset($_POST['update'])) {
            $title = validate($_POST['txttitle']);
            $description = validate($_POST['txtdescription']);
            $updated_by = $_SESSION['id'];
            $errors = [];
            if (!empty($title) && !empty($description)) {
                if (mb_strlen($title) > 100) {
                    $errors[] = "Long title (min 100)";
                }
                if (mb_strlen($description) > 255) {
                    $errors[] = "Long description (min 255)";
                } else {
                    $q = $db->prepare("SELECT * FROM t_categories WHERE title=?");
                    $q->execute([$title]);
                    $data = $q->fetch(PDO::FETCH_OBJ);
                    $id = $data->id;
                    echo "<scripti>alert(".$id.")</script>";
                   

                    $update_category_query = $db->prepare(
                        "UPDATE t_categories SET title = ?,description = ?,
                        updated_at = now(), updated_by =? WHERE id = ?"
                    );

                    $update_category_query->execute([$title,$description,$updated_by,$id]);
                    clear_input_data();

                    header('Location: ../views/manage-categories.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
                    exit();
                }
            } else {
                $errors [] = "All fields are required";
                save_input_data();
            }
        }else{
            clear_input_data();
        }
    }
} else {
    header('Location: ../views/manage-categories.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
    exit();
}
