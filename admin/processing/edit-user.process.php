<?php
session_start();
if (isset($_GET['username'])) {
    // Get the username provided in GET
    $username = $_GET['username'];

    // Check if the isset exist in the database
    $query = "SELECT * FROM t_admins WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$username]);
    $data = $stmt->fetch(PDO::FETCH_OBJ);
    $firstname = $data->firstname;
    $lastname = $data->lastname;

    // If the username doesn't exist, the usr will be redirected
    if (!$data) {
        header('Location: ../views/manage-users.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
        exit();
    } else {

        // Check if the submit button was been clicked
        if (isset($_POST['update'])) {

            // Get values provided by POST
            $firstname = validate($_POST['txtfirstname']);
            $lastname = validate($_POST['txtlastname']);
            $level = validate($_POST['txtlevel']);
            $updated_by = $_SESSION['username'];

            // Create the array which will contain errors
            $errors = [];

            // Check if the user have the required abilities
            if ($_SESSION['level'] != 1) {
                $errors[] = "You are not allowed to make this action";
            } else {

                //Now check if fields are not empty before to make a request to the database
                if (!empty($firstname) && !empty($lastname) && !empty($level)) {
                    $update_user_query = $db->prepare(
                        "UPDATE t_admins SET firstname = ?,lastname = ?, level =?,
                        updated_at = now(), updated_by =? WHERE username = ?"
                    );

                    $update_user_query->execute([$firstname, $lastname, $level, $updated_by, $data->username]);
                    clear_input_data();

                    header('Location: manage-users.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
                    exit();
                } else {
                    $errors[] = "All fields are required";
                    save_input_data();
                }
            }
        } else {
            clear_input_data();
        }
    }
} else {
    header('Location: ../views/manage-users.view.php?id=' . $_SESSION['id'] . 'username=' . $_SESSION['username'] . 'level=' . $_SESSION['level']);
    exit();
}
