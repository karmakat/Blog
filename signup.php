<?php
session_start();
require 'config/database.php';

//get back form data if there was a registration error
$firstname = $_SESSION['signup-data']['txtfirstname'] ?? null;
$lastname = $_SESSION['signup-data']['txtlastname'] ?? null;
$username = $_SESSION['signup-data']['txtusername'] ?? null;
$email = $_SESSION['signup-data']['txtemail'] ?? null;
$password = $_SESSION['signup-data']['txtpassword'] ?? null;
$confirm = $_SESSION['signup-data']['txtconfirm'] ?? null;

// delete signup data session
unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
</head>

<body>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign Up</h2>
            <?php if(isset($_SESSION['signup'])):?>
            <div class="alert_message error">
                <p>
                    <?=$_SESSION['signup'];
                        unset($_SESSION['signup'])
                    ?>
                </p>
            </div>
            <?php endif ?>
            <form autocomplete="off" action="<?=ROOT_URL?>processing/signup.process.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="txtfirstname" value="<?=$firstname?>" placeholder="First Name" id="txtfirstname">
                <input type="text" name="txtlastname" value="<?=$lastname?>" placeholder="Last Name" id="txtlastname">
                <input type="text" name="txtusername" value="<?=$username?>" placeholder="Username" id="txtusername">
                <input type="email" name="txtemail" value="<?=$email?>" placeholder="Email" id="txtemail">
                <input type="password" name="txtpassword" placeholder="Create Password" id="txtpassword">
                <input type="password" name="txtconfirm" placeholder="Confirm Password" id="txtconfirm">
                <div class="form_control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" class="btn" id="submit" name="submit">Sign Up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>
</body>

</html>