<?php require 'processing/signup.process.php';?>
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
            <?php include 'config/_errors.php';?>
            <form autocomplete="off" enctype="multipart/form-data" method="POST">
                <input type="text" name="txtfirstname" value="<?=get_input_data('txtfirstname')?>" placeholder="First Name" id="txtfirstname">
                <input type="text" name="txtlastname" value="<?=get_input_data('txtlastname')?>" placeholder="Last Name" id="txtlastname">
                <input type="text" name="txtusername" value="<?=get_input_data('txtusername')?>" placeholder="Username" id="txtusername">
                <input type="email" name="txtemail" value="<?=get_input_data('txtemail')?>" placeholder="Email" id="txtemail">
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