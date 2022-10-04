<?php require '../processing/update-password.process.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL?>css/style.css">
    <link rel="stylesheet" href="<?= ROOT_URL?>fonts/icomoon/style.css">
    <script src="<?= ROOT_URL?>js/main.js"></script>
    <script src="<?= ROOT_URL?>js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign In</h2>
            <?php require '../config/_errors.php';?>
            <form autocomplete="off" method="POST" enctype="multipart/form-data">
            
                <input type="password" name="txtoldpassword" placeholder="Old Password">
                <input type="password" name="txtnew" placeholder="New Password">
                <input type="password" name="txtconfirm" placeholder="Confirm Password">
                <button type="submit" name="update" class="btn">Update</button>
            </form>
        </div>
    </section>
</body>

</html>