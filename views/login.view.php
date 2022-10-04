<?php require '../processing/login.process.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
</head>

<body>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign In</h2>
            <?php require '../config/_flash.php';?>
            <form autocomplete="off" method="POST">
                <input type="text" name="txtauth" value="<?=get_input_data('txtauth')?>" placeholder="Username or Email">
                <input type="password" name="txtpassword" placeholder="Password">
                <button type="submit" name="login" class="btn">Sign In</button>
                <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
            </form>
        </div>
    </section>
</body>

</html>