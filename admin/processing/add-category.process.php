<?php
redirect_the_user('add-category');

try {
    if (isset($_POST['add'])) {

        $title = validate($_POST['txttitle']);
        $description = validate($_POST['txtdescription']);
        $created_by = $_SESSION['id'];

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
                    $errors [] = $title . " already exist as a category";
                } else {
                    $add_category_query = $db->prepare(
                        "INSERT INTO t_categories(title,description,created_at,created_by)
                        VALUES(?,?,now(),?)"
                    );
                    $add_category_query->execute(array($title, $description, $created_by));

                    set_flash($title . " was added as a category", "success");
                }
            }
        } else {
            $errors[] = "All fieds are required";
            save_input_data();
        }
    } else {

        clear_input_data();
    }
} catch (Exception $e) {
    echo "Adding Error : " . $e->getMessage();
}
