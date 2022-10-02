<?php
if (isset($_GET['title'])) {
    $title = $_GET['title'];
    // Check if the isset exist in the database
    $query = "SELECT * FROM t_categories WHERE title = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$title]);
    $data = $stmt->rowCount();
    if ($data == 0) {
        header('Location: manage-categories.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
        exit();
    } else {
        if (isset($_POST['update'])) {
            $title = validate($_POST['txttitle']);
            $description = validate($_POST['txtdescription']);
            $updated_by = $_SESSION['id'];
            $updated_at = time();
            $errors = [];
            if (!empty($title) && !empty($description)) {
                if (mb_strlen($title) > 100) {
                    $errors[] = "Long title (min 100)";
                }
                if (mb_strlen($description) > 255) {
                    $errors[] = "Long description (min 255)";
                } else {
                    $q = $db->prepare("SELECT id FROM t_categories WHERE title=?");
                    $q->execute([$title]);
                    $data = $q->rowCount();
                    if ($data > 0) {
                        $errors[] = $title . " already exist as a category";
                    } else {
                        $data = $q->fetch(PDO::FETCH_OBJ);
                        $id = $data->id;
                        $add_category_query = $db->prepare(
                            "UPDATE t_categories SET title = :title,description = :description,
                            updated_at = :updated_at, updated_by =:updated_by
                            WHERE id = :id"
                        );
                        $add_category_query->execute([
                            'title' => $title, 'description' => $description,
                            'updated_at' => $updated_at, 'updated_by' => $updated_by,
                            'id' => $id
                        ]);
                        header('Location: manage-categories.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
                        exit();
                    }
                }
            } else {
                clear_input_data();
            }
        }
    }
} else {
    header('Location: manage-categories.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
    exit();
}
